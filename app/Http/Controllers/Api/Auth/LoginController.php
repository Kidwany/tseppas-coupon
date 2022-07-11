<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ErrorClass;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Login api
     *
     * @param Request $request
     * @return $validation
     *
     * Method: POST
     ***********************************************************
     * Inputs
     ***********************************************************
     * 'email' => 'string'
     * 'password' => 'string'
     * 'mobile_token' => 'string'
     ***********************************************************
     * Headers:
     ***********************************************************
     * Content-Type  => application/json
     * Accept  => application/json
     ***********************************************************
     * Response Codes:
     ***********************************************************
     * 405 => Email is Empty
     * 406 => Password is Empty
     * 407 => Mobile Token is Empty
     * 408 => Platform is Empty
     * 409 => OS Version is Empty
     * 410 => Mobile Brand is Empty
     * 411 => IP is Empty
     * 401 => Login Faild
     * 200 => Logged In Successfully
     */
    public function attempt(Request $request)
    {
        $input = $request->all();
        // Check Existence of Name

        $validation = $this->validateRequest($request);
        if (!empty($validation)) {
            return $validation;
        }

        // Revoke all user tokens
        $check_user = User::where("phone", \request('phone'))->where('status_id', 14)->first();
        if ($check_user)
        {
            $check_user->tokens()->get()->map(function ($token) {
                $token->revoke();
            });
        }

        if(Auth::attempt(['phone' => request('phone'), 'password' => request('password'), 'status_id' => 14])){
            $user = Auth::user();
            $user->mobile_token = $request->mobile_token;
            $user->platform = \request('platform');
            $user->save();
            $token =  $user->createToken('MyApp')->accessToken;

            $userInfo = [
                'id' => $user->id,
                'user_type_id' => $user->user_type_id,
                'name' => $user->name,
                'code' => $user->code,
                'is_available' => $user->currently_available,
                'email' => $user->email,
                'mobile_token' => $user->mobile_token,
                'image_url' => assetPath($user->image_url),
                'phone' => $user->phone,
                'lang'  => $user->lang
            ];

            try{
                DB::beginTransaction();

                // Save user logins
                DB::table('user_logins')->insert([
                    'user_id' => $user->id,
                    'platform' => \request('platform'),
                    'ip' => \request('ip_address'),
                    'os_version' => \request('os_version'),
                    'mobile_brand' => \request('mobile_brand'),
                ]);
                DB::commit();
                return response()->json(["status" => 'success', 'code' => 200, 'data' => ['userInfo' => $userInfo, 'token' => $token]], 200);
            }
            catch (\Exception $exception)
            {
                DB::rollBack();
                $e = new ErrorClass();
                $e->Error_Save(__CLASS__, __FUNCTION__,
                    $exception->getMessage() . '       line -> ' . $exception->getLine(), 0);
                return response()->json(['status' => 'error', 'code' => 500, 'error' => 'Error on Saving Data'], 500);
            }
            //$mobileToken->update(['token', $request->mobile_token]);
        }
        else
        {
            return response()->json(['status' => 'error', 'code' => 401, 'error' => 'Invalid username or password'], 401);
        }
    }


    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateRequest($request)
    {
        $input = $request->all();

        if (empty($input['phone']))
        {
            return response()->json(["status" => "error", "code" => 405, 'error' => 'Phone is required'], 405);
        }
        // Check Phone
        elseif (empty($input['password']) || strlen($input['password']) < 8)
        {
            return response()->json(["status" => "error", "code" => 406, 'error' => 'Password Must Be at Least 8 Numbers'], 406);
        }
        // Check Mobile Token
        elseif (empty($input['mobile_token']))
        {
            return response()->json(['status' => "error", "code" => 407,'error' => 'Mobile Token Can\'t Be Empty'], 407);
        }

        elseif (empty($input['platform']))
        {
            return response()->json(['status' => "error", "code" => 408,'error' => 'Platform Can\'t Be Empty'], 408);
        }

        elseif (empty($input['os_version']))
        {
            return response()->json(['status' => "error", "code" => 409,'error' => 'Os Version Can\'t Be Empty'], 409);
        }

        elseif (empty($input['mobile_brand']))
        {
            return response()->json(['status' => "error", "code" => 410,'error' => 'Mobile Brand Can\'t Be Empty'], 410);
        }

        elseif (empty($input['ip_address']))
        {
            return response()->json(['status' => "error", "code" => 411,'error' => 'IP Can\'t Be Empty'], 411);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'status'    => 200,
            'message' => 'Logged out'
        ]);
    }
}

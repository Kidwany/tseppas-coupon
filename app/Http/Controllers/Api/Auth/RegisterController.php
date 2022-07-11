<?php

namespace App\Http\Controllers\Api\Auth;
use App\Helpers\CheckPhone;
use App\Helpers\ErrorClass;
use App\Helpers\RandomString;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Register api
     *
     * @param Request $request
     * @return $validation
     *
     *
     ***********************************************************
     * Method: POST
     ***********************************************************
     * Inputs
     ***********************************************************
     * 'name' => 'string'
     * 'phone' => 'string'
     * 'email' => 'string'
     * 'password' => 'string'
     * 'platform' => 'integer'  // If Android Enter 1 If IOS Enter 2
     * 'lang' => 'string'  // ar or en
     * 'mobile_token' => 'string'
     ***********************************************************
     * Headers:
     ***********************************************************
     * Content-Type  => application/json
     * Accept  => application/json
     ***********************************************************
     * Response Codes:
     ***********************************************************
     * 402 => Email Has Been Taken
     * 405 => Name is Empty or Less Than Two Characters
     * 406 => Phone is Empty or Less than 8 numbers
     * 407 => Password is required or less than 8 chars
     * 408 => platform is required
     * 409 => mobile token is required
     * 410 => ip_address is required
     * 200 => registered Successfully
     * 500 => Server Error
     */
    public function register(Request $request)
    {
        // Validate Email is Unique
        $validation = $this->validateRequest($request);
        if (!empty($validation)) {
            return $validation;
        }

        try {

            DB::beginTransaction();

            $user = new User();
            $user->password = Hash::make(\request('password'));
            $user->name = \request('name');
            $user->email = \request('email');
            $user->phone = substr(\request('phone'), 0, 1) == 2 ? \request('phone') : "2" . \request('phone');
            $user->mobile_token = \request('mobile_token');
            $user->auth_token = Str::random(300);
            $user->image_url = 'image/user.png';
            $user->user_type_id = 1;
            $user->code = '#' . RandomString::generate();
            $user->lang = \request('lang') && in_array(\request('lang'), ['en', 'ar']) ? \request('lang') : 'ar';
            $user->status_id = 14;
            $user->platform = \request('platform');
            $user->save();

            // Save Balance
            /*DB::table('balance')->insert([
                'user_id' => $user->id,
                "amount" => 0
            ]);*/

            // Save user logins
            DB::table('user_logins')->insert([
                'user_id' => $user->id,
                'platform' => \request('platform'),
                'ip' => \request('ip_address'),
                'os_version' => \request('os_version'),
                'mobile_brand' => \request('mobile_brand'),
            ]);

            //$token =  $user->createToken('MyApp')->accessToken;
            $token =  $user->auth_token;

            $userInfo = [
                'id' => $user->id,
                'name' => $user->name,
                'code' => $user->code,
                'email' => $user->email,
                'mobile_token' => $user->mobile_token,
                'image_url' => assetPath($user->image_url),
                'phone' => $user->phone,
                'lang' => $user->lang
            ];

            DB::commit();

            return response()->json(["status" => "success", "code" => 200 , "data" => ['userInfo' => $userInfo, 'token'=>$token]], 200);

        } catch (\Exception $exception) {
            DB::rollBack();
            $e = new ErrorClass();
            $e->Error_Save(__CLASS__, __FUNCTION__,
                $exception->getMessage() . '       line -> ' . $exception->getLine(), 0);
            return response()->json(['status' => "error", "code" => 500, 'message' => 'Error on Saving Data'], 500);
        }
    }


    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateRequest($request)
    {
        $input = \request()->all();

        $validator = Validator::make($request->all(), [
            'phone' => 'unique:users',
        ]);

        // if email has been taken
         // Check Existence of Name
        if (empty($input['name']) || strlen($input['name']) < 2) {
            return response()->json(['status' => "error", "code" => 405, 'error' => 'User Name Must Be at Least 2 Chars'], 405);
        } // Check Phone
        elseif (empty($input['phone']) || strlen($input['phone']) < 8) {
            return response()->json(['status' => "error", "code" => 406, 'error' => 'Phone Must Be at Least 10 Numbers'], 406);
        } // Check Password
        if (!(new CheckPhone(\request("phone")))->checkPhoneExistence()) {
            return response()->json(['status' => "error", "code" => 402, 'error' => 'Phone Has Been Taken'], 402);
        }
        elseif (empty($input['password']) || strlen($input['password']) < 8) {
            return response()->json(['status' => "error", "code" => 407, 'error' => 'Password Must Be at Least 8 Letters'], 407);
        } // Check Email
        /*elseif (empty($input['email'])) {
            return response()->json(['status' => 411, 'error' => 'Email Is Required'], 411);
        }*/ // Check Platform
        elseif (empty($input['platform'])) {
            return response()->json(['status' => "error", "code" => 408, 'error' => 'Platform is Required'], 408);
        } // Check Mobile Token
        elseif (empty($input['mobile_token'])) {
            return response()->json(['status' => "error", "code" => 409, 'error' => 'Mobile Token Is Required'], 409);
        }
    }
}

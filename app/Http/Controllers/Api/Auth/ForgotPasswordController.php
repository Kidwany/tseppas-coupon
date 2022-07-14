<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\CheckPhone;
use App\Helpers\ErrorClass;
use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\User;
use App\Models\User\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class ForgotPasswordController
 * @package App\Http\Controllers\Api\Auth
 */
class ForgotPasswordController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone' => 'required|max:20',
            ]);
            if (empty(\request('phone')) || strlen(\request('phone')) < 8 ||  strlen(\request('phone')) > 15) {
                return $this->failureResponse(422, "Invalid phone Number");
            }

            $user = User::query()
                ->where('phone', (new CheckPhone(\request('phone')))->formattedPhone())
                ->first();

            if(!empty($user))
            {
                $password_reset = new PasswordReset();
                $password_reset->phone = \request('phone');
                $password_reset->email = \request('phone');
                $password_reset->token = Str::random(60);
                $password_reset->created_at = Carbon::now(+2);
                $password_reset->save();

                //return response()->json(['status' => 'success', 'code' => 200, 'data' => ['token' => $token]], 200);
                return $this->successResponse(['token' => $password_reset->token]);
            }
            return $this->failureResponse(403, 'Phone Not Found');

        } catch (\Exception $exception) {
            DB::rollBack();
            $e = new ErrorClass();
            $e->Error_Save(__CLASS__, __FUNCTION__,
                $exception->getMessage() . '       line -> ' . $exception->getLine(), 0);
            //return response()->json(['status' => 'error', 'code' => 500, 'message' => 'Error on Saving Data'], 500);
            return $this->failureResponse(500, 'Error on Saving Data');
        }
    }

    /**
     * * Method: POST
     ***********************************************************
     * Inputs
     ***********************************************************
     * 'phone' => 'string'
     * 'password' => 'string|length >= 8'
     ***********************************************************
     * Headers:
     ***********************************************************
     * Content-Type  => application/json
     * Accept  => application/json
     ***********************************************************
     * Response Codes:
     ***********************************************************
     * 405 => Phone is Empty
     * 406 => Password is Empty
     * 407 => Invalid token
     * 408 => Failed
     * 409 => Phone not found
     * 500 => Server Error
     * 200 => Password Updated Successfully
     * @param Request $request
     * @param $token
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function reset(Request $request, $token)
    {
        $validation = $this->validateRequest($request);
        if (!empty($validation)) {
            return $validation;
        }

        try {
            $user = User::query()->where('phone', (new CheckPhone(\request('phone')))->formattedPhone())
                ->where('status_id', Status::IS_ACTIVE)
                ->first();
            if (!$user)
            {
                //return response()->json(['status' => 'error', 'code' => '409', 'message' => 'Phone not found'], 409);
                return $this->failureResponse(409, 'Phone not found');
            }

            $password_reset_token = PasswordReset::query()->where('token', $token)
                ->where('phone', \request('phone'))->orderBy('created_at', 'desc')
                ->first();
            if(!$password_reset_token || ($password_reset_token->created_at < Carbon::now()->subHours(2))) {
                return $this->failureResponse(407, 'Invalid Token');
            }

            // update password
            $user->password = Hash::make(\request('new_password'));
            if ($user->save())
            {
                // Delete Token
                DB::table('password_resets')->where('phone', \request('phone'))->delete();
                return $this->successResponse();
            }
            return $this->failureResponse(408, 'Failed on updating password');
        }
        catch (\Exception $exception) {
            DB::rollBack();
            $e = new ErrorClass();
            $e->Error_Save(__CLASS__, __FUNCTION__,
                $exception->getMessage() . '       line -> ' . $exception->getLine(), 0);
            return $this->failureResponse(500, 'Error on Saving Data');
        }
    }


    /**
     * @param $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function validateRequest($request)
    {
        $input = $request->all();
        if (empty($input['phone']))
        {
            return $this->failureResponse(405, 'Phone is required');
        }
        elseif (empty($input['new_password']) || strlen($input['new_password']) < 8)
        {
            return $this->failureResponse(406, 'Password Must Be at Least 8 Numbers');
        }
    }
}

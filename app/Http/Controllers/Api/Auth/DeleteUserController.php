<?php

namespace App\Http\Controllers\Api\Auth;
use App\Classes\ErrorClass;
use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordEmail;
use App\Mail\VerifyUser;
use App\Models\User;
use App\Models\UserBalance;
use App\Models\UserToken;
use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class DeleteUserController
 * @package App\Http\Controllers\Api\Auth
 */
class DeleteUserController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::query()->where("id", $id)->first();
        if (!isset($user) || empty($user))
        {
            return $this->failureResponse(402, 'User Not Found');
        }

        try {
            DB::beginTransaction();

            DB::table('user_logins')->where('user_id', $id)->delete();

            $user->delete();

            DB::commit();

            return $this->successResponse();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            $e = new \App\Helpers\ErrorClass();
            $e->Error_Save(__CLASS__, __FUNCTION__,
                $exception->getMessage() . '       line -> ' . $exception->getLine(), 0);
            return $this->failureResponse(500, 'Error on Saving Data');
        }

    }

}

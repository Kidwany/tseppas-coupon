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

class ResetPasswordController extends Controller
{

    /**
     * @param $token
     * @return Factory|View|string
     * @method GET
     * @Function_Description Return Reset Password View And The Token Will Be Expired Within 2 Hours
     */
    public function resetPasswordView($token)
    {
        $check_token = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))->first();

        if (!empty($check_token))
        {
            return view('auth.passwords.reset', compact('check_token'));
        }
        elseif( $check_token = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '<', Carbon::now()->subHours(2))->first())
        {
            return 'Expired Token';
        }

        elseif(empty($check_token))
        {
            return 'Token Not Found';
        }
        else
        {
            return 'Not Found';
        }
    }

    /**
     * @method POST
     * @Function_Description This Function Saves New Password
     */
    public function resetPassword()
    {
        //$input = $request->all();

        $validator = Validator::make(\request()->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 422);
        }

        $token = \request('token');
        $check_token = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if (!empty($check_token))
        {
            $user = User::query()->where('email', $check_token->email)->update([
                'email' => $check_token->email,
                'password' => bcrypt(\request('password'))
            ]);
            return redirect()->back()->with('update', 'Your Password Updated Successfully');
        }
        else
        {
            return 'error';
        }
    }
}

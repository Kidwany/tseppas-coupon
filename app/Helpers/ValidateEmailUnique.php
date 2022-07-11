<?php


namespace App\Helpers;


use App\Models\ServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;

class ValidateEmailUnique
{
    /**
     * @param $email
     * @param $user_id
     * @return bool
     */
    public static function validateEmail($email, $user_id = null)
    {
        if ($user_id)
        {
            $is_taken_in_users = User::where('id', '!=' ,$user_id)->where('email', $email)->first();
        }
        else
        {
            $is_taken_in_users = User::where('email', $email)->first();
        }
        if ($is_taken_in_users)
        {
            return true;
        }else
        {
            return false;
        }
    }
}

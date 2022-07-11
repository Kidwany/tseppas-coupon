<?php


namespace App\Helpers;


use App\Models\ServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;

class ValidatePhoneUnique
{
    /**
     * @param $phone
     * @param $user_id
     * @return bool
     */
    public static function validatePhoneUnique($phone, $user_id = false)
    {
        if ($user_id)
        {
            $is_taken_in_users = User::where('id', '!=' ,$user_id)->where('phone', $phone)->first();
        }
        else
        {
            $is_taken_in_users = User::where('phone', $phone)->first();
        }
        if ($is_taken_in_users)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

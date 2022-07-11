<?php


namespace App\Helpers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserSetting
{

    /**
     * @return string
     */
    public static function userLanguage()
    {

        if ($authenticatedUser = Auth::user())
        {
            app()->setLocale(User::where('id', $authenticatedUser->id)->first()->lang);
            return $userLang = User::where('id', $authenticatedUser->id)->first()->lang;
        }

        else
        {
            return 'ar';
        }
    }

    public static function userLanguageID()
    {
        if ($authenticatedUser = Auth::user())
        {
            app()->setLocale(User::where('id', $authenticatedUser->id)->first()->lang);
            $userLang = User::where('id', $authenticatedUser->id)->first()->lang;
            if ($userLang == "en")
            {
                return 1; // English language_id
            }
            else
            {
                return 2; // Arabic language_id
            }
        }

        else
        {
            return 2;
        }
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 11/5/2020
 * Time: 2:06 AM
 */

namespace App\Traits;


use Illuminate\Support\Facades\Auth;

/**
 * Trait MobileToken
 * @package App\Traits
 */
trait MobileToken
{

    /**
     * @param $token
     * @return bool
     */
    public function updateFCMToken($token)
    {
        $user = Auth::user();
        $user->mobile_token = $token;
        if ($user->save())
            return true;
        return false;
    }
}

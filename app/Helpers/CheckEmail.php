<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 7/31/2020
 * Time: 11:34 PM
 */

namespace App\Helpers;


use App\User;

class CheckEmail
{
    /**
     * @var
     */
    public $email;

    /**
     * CheckPhone constructor.
     * @param $email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function checkPhoneExistence()
    {
        $user = User::where('email', $this->email)->where->first();
        if (empty($user))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

}

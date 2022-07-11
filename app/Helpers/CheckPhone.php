<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 7/31/2020
 * Time: 11:34 PM
 */

namespace App\Helpers;

use App\Models\User;

class CheckPhone
{
    /**
     * @var
     */
    public $phone;

    /**
     * CheckPhone constructor.
     * @param $phone
     */
    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function checkPhoneExistence()
    {
        $user = User::query()->where('phone', $this->formattedPhone())->first();
        if (empty($user))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function formattedPhone()
    {
        if (substr(\request('phone'), 0, 1) == 2)
            return $this->phone;
        else
            return 2 . $this->phone;
    }

    public function getOriginalNumber()
    {
        if (substr($this->phone, 0, 1) == 2)
            return ltrim($this->phone, 2);
        else
            return $this->phone;
    }

}

<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class SettingPolicy
 * @package App\Policies
 */
class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     */
    public function updatePaymentSetting(User $user)
    {
        return $user->hasPermission("update_payment_setting");
    }

    /**
     * @param User $user
     */
    public function updateContactInfo(User $user)
    {
        return $user->hasPermission("update_contact_info");
    }
}

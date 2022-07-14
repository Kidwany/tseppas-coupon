<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class NotificationPolicy
 * @package App\Policies
 */
class NotificationPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function addNotification(User $user)
    {
        return $user->hasPermission("add_new_notification");
    }
}

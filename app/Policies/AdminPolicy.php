<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class AdminPolicy
 * @package App\Policies
 */
class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function showAllAdmins(User $user)
    {
        return $user->hasPermission("show_all_admins");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function addNewAdmin(User $user)
    {
        return $user->hasPermission("add_new_admin");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function updateAdmin(User $user)
    {
        return $user->hasPermission("update_admin");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function deleteAdmin(User $user)
    {
        return $user->hasPermission("delete_admin");
    }
}

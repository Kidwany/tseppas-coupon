<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class RolePolicy
 * @package App\Policies
 */
class RolePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function showAllRoles(User $user)
    {
        return $user->hasPermission("show_all_roles");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function addNewRole(User $user)
    {
        return $user->hasPermission("add_new_role");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function updateRole(User $user)
    {
        return $user->hasPermission("update_role");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function deleteRole(User $user)
    {
        return $user->hasPermission("delete_role");
    }
}

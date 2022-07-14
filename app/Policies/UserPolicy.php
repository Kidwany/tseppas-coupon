<?php

namespace App\Policies;

use App\Models\Permissions\Role;
use App\Traits\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserPolicy
 * @package App\Policies
 */
class UserPolicy
{
    use HandlesAuthorization, Permission;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function showAllUsers(User $user)
    {
        return $user->hasPermission("show_all_users");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param User|null $model
     * @return mixed
     */
    public function showUserProfile(User $user, User $model = null)
    {
        return $user->hasPermission("show_user_profile");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function showUserOrders(User $user)
    {
        return $user->hasPermission("show_user_orders");
    }

    public function addNewStar(User $user)
    {
        return $user->hasPermission("add_new_star");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param User|null $model
     * @return mixed
     */
    public function deleteUser(User $user, User $model = null)
    {
        return $user->hasPermission("delete_user");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function showAllStars(User $user)
    {
        return $user->hasPermission("show_all_stars");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function showStarProfile(User $user)
    {
        if ($user->hasPermission("show_star_profile"))
            return true;
        return false;
    }

    /**
     * @param User $star
     * @return bool
     */
    public function updateStar(User $star)
    {
        return $this->hasPermission("update_star");
    }

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

<?php

namespace App\Policies;

use App\Models\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function showAllCategories(User $user)
    {
        return $user->hasPermission("show_all_categories");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @return mixed
     */
    public function addNewCategory(User $user)
    {
        return $user->hasPermission("add_new_category");
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @param Category $category
     * @return mixed
     */
    public function updateCategory(User $user, Category $category)
    {
        return $user->hasPermission("update_category");
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Category $category
     * @return mixed
     */
    public function deleteCategory(User $user, Category $category)
    {
        return $user->hasPermission("delete_category");
    }
}

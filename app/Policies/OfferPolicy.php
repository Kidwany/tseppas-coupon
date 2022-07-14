<?php

namespace App\Policies;

use App\Traits\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class OfferPolicy
 * @package App\Policies
 */
class OfferPolicy
{
    use HandlesAuthorization, Permission;

    /**
     * @param User $user
     * @return bool
     */
    public function showAllOffers(User $user)
    {
        return $user->hasPermission("show_all_offers");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function addNewOffer(User $user)
    {
        return $user->hasPermission("add_new_offer");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function updateOffer(User $user)
    {
        return $user->hasPermission("update_offer");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function deleteOffer(User $user)
    {
        return $user->hasPermission("delete_offer");
    }
}

<?php

namespace App\Policies;

use App\Models\PromoCode\Promo_code;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PromoCodePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function showAllPromoCodes(User $user)
    {
        return $user->hasPermission("show_all_promo_codes");
    }


    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function addNewPromoCode(User $user)
    {
        return $user->hasPermission("add_new_promo_code");
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PromoCode\Promo_code  $promoCode
     * @return mixed
     */
    public function updatePromoCode(User $user, Promo_code $promoCode)
    {
        return $user->hasPermission("update_promo_code");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PromoCode\Promo_code  $promoCode
     * @return mixed
     */
    public function deletePromoCode(User $user, Promo_code $promoCode)
    {
        return $user->hasPermission("delete_promo_code");
    }
}

<?php

namespace App\Policies;

use App\Models\Order\Order;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class OrderPolicy
 * @package App\Policies
 */
class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function showAllOrders(User $user)
    {
        return $user->hasPermission("show_all_orders");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Order|null $order
     * @return mixed
     */
    public function showOrderDetails(User $user, Order $order = null)
    {
        return $user->hasPermission("show_order_details");
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function cancelOrder(User $user, Order $order)
    {
        return $user->hasPermission("cancel_order");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function showOrderStatistics(User $user)
    {
        return $user->hasPermission("show_orders_statistics");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function showLatestOrders(User $user)
    {
        return $user->hasPermission("show_latest_orders");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function showGeneralStatistics(User $user)
    {
        return $user->hasPermission("show_dashboard_statistics");
    }
}

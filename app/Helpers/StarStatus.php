<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 7/2/2020
 * Time: 3:07 AM
 */

namespace App\Helpers;

use App\Models\Order\Order;
use Illuminate\Support\Facades\Auth;

/**
 * Class StarStatus
 * @package App\Helpers
 */
class StarStatus
{

    /**
     * @return bool
     */
    public static function havRunningOrders()
    {
        $current_orders = Order::where('star_id', Auth::user()->id)->where('status_id', 13)->count();
        if ($current_orders > 0)
            return true;
        return false;
    }
}

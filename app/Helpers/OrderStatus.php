<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 7/2/2020
 * Time: 3:07 AM
 */

namespace App\Helpers;

use App\Models\Order\Order;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

/**
 * Class OrderStatus
 * @package App\Helpers
 */
class OrderStatus
{
    use \App\Traits\Status;
    /**
     * @param $order_id
     */

    private $status;

    /**
     * @param $status_id
     * @return mixed
     */
    public static function getStatusLocale(int $status_id): string
    {
        $status = Status::where("id", $status_id)->first();
        if (UserSetting::userLanguage() == "ar")
            return $status->status_ar;
        return $status->status;
    }
    /**
     * @param $order_id
     * @return bool
     */
    public static function isAvailable($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        if ($order && (($order->status_id != 1) || ($order->star_id != null))) // if order cancelled or running or delivered
            return false;

        if (Auth::user()->user_type_id != 2)
            return false;

        return true;
    }

    /**
     * @param $order_id
     * @return false
     */
    public static function isRunning($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        if ($order->status_id != 13)
            return false;
    }
}

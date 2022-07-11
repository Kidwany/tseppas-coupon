<?php


namespace App\Helpers;


use App\Models\Finance\Payment_setting;

class CalculateFare
{

    /**
     * @param $distance
     * @return float|int
     */
    public static function calculate($distance, $duration = null)
    {
        $payment_setting    = Payment_setting::query()->first();
        $max_distance       = $payment_setting->max_distance;
        $minimum_value      = $payment_setting->minimum_delivery_value_per_order;
        $start_amount       = $payment_setting->start_amount;
        $kilometer_price    = $payment_setting->kilometer_price;
        $trip_duration      = isset($duration) ? $duration : 0;

        if ($distance <= $max_distance)
            $service_value = $minimum_value + $payment_setting->commission_amount_per_order;
        else
            $service_value =
                ($kilometer_price   * $distance) +
                ($trip_duration     * $payment_setting->star_minute_price) +
                $start_amount       + $payment_setting->commission_amount_per_order;

        return ceil($service_value);
    }
}

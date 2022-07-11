<?php


namespace App\Helpers;


use App\Models\Order\Order_detail;

/**
 * Class Distance
 * @package App\Helpers
 */
class Distance
{
    /*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
    /*::                                                                         :*/
    /*::  This routine calculates the distance between two points (given the     :*/
    /*::  latitude/longitude of those points). It is being used to calculate     :*/
    /*::  the distance between two locations using GeoDataSource(TM) Products    :*/
    /*::                                                                         :*/
    /*::  Definitions:                                                           :*/
    /*::    South latitudes are negative, east longitudes are positive           :*/
    /*::                                                                         :*/
    /*::  Passed to function:                                                    :*/
    /*::    lat1, lon1 = Latitude and Longitude of point 1 (in decimal degrees)  :*/
    /*::    lat2, lon2 = Latitude and Longitude of point 2 (in decimal degrees)  :*/
    /*::    unit = the unit you desire for results                               :*/
    /*::           where: 'M' is statute miles (default)                         :*/
    /*::                  'K' is kilometers                                      :*/
    /*::                  'N' is nautical miles                                  :*/
    /*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

    /**
     * @param $lat1
     * @param $long1
     * @param $lat2
     * @param $long2
     * @param string $unit
     * @return float
     */
    public static function get($lat1, $long1, $lat2, $long2, $unit = 'K')
    {
        $theta = $long1 - $long2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);

        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

    /**
     * @param $star_lat
     * @param $star_long
     * @param $order_id
     * @return bool
     */
    public static function inArea($star_lat, $star_long, $order_id)
    {
        $order_details = Order_detail::where('order_id', $order_id)->first();
        $distance = self::get($star_lat, $star_long, $order_details->pickup_lat, $order_details->pickup_long);
        /*if ($distance > config('order_config.max_distance'))
            return false;*/
        return true;
    }
}

<?php


namespace App\Helpers;


use Carbon\Carbon;
use DateInterval;
use Exception;

/**
 * Class Distance
 * @package App\Helpers
 */
class TimeDifference
{

    /**
     * @param $first_time
     * @param $second_time
     * @param $unit
     * @return DateInterval|false
     * @throws Exception
     */
    public static function calculate($first_time, $second_time, $unit)
    {
        $datetime1 = Carbon::parse($first_time);
        $datetime2 = Carbon::parse($second_time);
        $difference = "";
        if ($unit == 'h')
        {
            $difference = $datetime1->diffInHours($datetime2);
        }
        elseif ($unit == 'm')
        {
            $difference = $datetime1->diffInMinutes($datetime2);
        }
        elseif ($unit == 'y')
        {
            $difference = $datetime1->diffInYears($datetime2);
        }
        elseif ($unit == 'd')
        {
            $difference = $datetime1->diffInDays($datetime2);
        }
        return $difference;
    }
}

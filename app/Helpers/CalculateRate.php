<?php


namespace App\Helpers;


use App\Models\AppointmentFeedback;

class CalculateRate
{
    /**
     * @param $sp_id
     * @return mixed
     */
    public static function calculate($sp_id)
    {
        $appointment = AppointmentFeedback::where('sp_id', $sp_id)->where('user_to_sp_rate', '!=', null)->avg('user_to_sp_rate');
        if($appointment)
        {
            return $appointment;
        }
        else
        {
            return 5;
        }
    }
}

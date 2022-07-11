<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 7/1/2020
 * Time: 10:17 PM
 */

namespace App\Helpers;


use App\Models\PromoCode;
use App\Models\PromoCodeUser;
use App\Models\ServiceProvider;
use App\Models\TotalPromoCodeUsage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class CheckPromoCode
 * @package App\Classes
 */
class CheckPromoCode
{
    /**
     * @param $promo_code
     * @param null $service_provider_id
     * @return array|int
     */
    public static function checkCode($promo_code, $service_provider_id = null)
    {
        $code = PromoCode\Promo_code
            ::where('code', $promo_code)
            ->where('expire_date', '>=', Carbon::today())
            ->first();

        if (empty($code))
        {
            return 0;
        }

        /*if ($service_provider_id)
        {
            $service_provider = ServiceProvider::where('id', $service_provider_id)->select(['id', 'type_id'])->first();

            if (!$service_provider) // Check if service provider not found
            {
                return 0;
            }
            // Check if service provider have promo code
            if ($code->sp_id && $code->sp_id != $service_provider->id)
            {
                return 0;
            }
            // check if service provider type is car wash and promo code for car wash
            if ($service_provider->type_id == 1 && $code->owner_type != 'car_wash' && $code->sp_id == null)
            {
                return 0;
            }
            // check if service provider type is car polish and promo code for car polish
            if ($service_provider->type_id == 2 && $code->owner_type != 'car_polish' && $code->sp_id == null)
            {
                return 0;
            }
        }*/

        // Check Total Promo Code Usage
        $promo_code_usage = PromoCode\Total_promo_code_usage::where('promo_code_id', $code->id)->first();
        if ($promo_code_usage->using_times >= $code->bandwidth)
        {
            return 0;
        }

        // Check Every User Using Times
        if (Auth::check())
        {
            $using_times = PromoCode\Promo_code_usage::where('user_id', Auth::user()->id)->first();
            if (!empty($using_times) && $using_times->using_times >= $code->user_usage)
            {
                return 0;
            }
        }

        return [
            'id'        => $code->id,
            'code'      => $code->code,
            'discount'  => $code->amount
        ];

    }


    /**
     * @param $promo_code_id
     * @param null $service_provider_id
     * @return array|int
     */
    public static function checkCodeByID($promo_code_id, $service_provider_id = null)
    {
        $code = PromoCode\Promo_code
            ::where('id', $promo_code_id)
            ->where('expire_date', '>=', Carbon::today())
            ->first();

        if (empty($code))
        {
            return 0;
        }

        if ($service_provider_id)
        {
            $service_provider = ServiceProvider::where('id', $service_provider_id)->where('is_active', 1)->first();

            if (!$service_provider) // Check if service provider not found
            {
                return 0;
            }
            // Check if service provider have promo code
            if ($code->sp_id && $code->sp_id != $service_provider->id)
            {
                return 0;
            }
            // check if service provider type is car wash and promo code for car wash
            if ($service_provider->type_id == 1 && $code->owner_type != 'car_wash' && $code->sp_id == null)
            {
                return 0;
            }
            // check if service provider type is car polish and promo code for car polish
            if ($service_provider->type_id == 2 && $code->owner_type != 'car_polish' && $code->sp_id == null)
            {
                return 0;
            }
        }

        // Check Total Promo Code Usage
        $promo_code_usage = PromoCode\Total_promo_code_usage::where('promo_code_id', $code->id)->first();
        if ($promo_code_usage->using_times >= $code->bandwidth)
        {
            return 0;
        }

        // Check Every User Using Times
        if (Auth::check())
        {
            $using_times = PromoCode\Promo_code_usage::where('user_id', Auth::user()->id)->first();
            if (!empty($using_times) && $using_times->using_times >= $code->user_usage)
            {
                return 0;
            }
        }

        return [
            'id'        => $code->id,
            'code'      => $code->code,
            'discount'  => $code->amount
        ];
    }

    public static function getDiscountAmount($promo_code_discount, $service_value){

    }

}

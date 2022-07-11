<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 7/2/2020
 * Time: 3:07 AM
 */

namespace App\Helpers;

use App\Models\PromoCode\Promo_code_usage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsePromoCode
{
    /**
     * @param $promo_code_id
     */
    public static function usePromoCode($promo_code_id)
    {
        $promo_code_usage = Promo_code_usage::where('user_id', Auth::user()->id)->where('promo_code_id', $promo_code_id)->first();
        if (!empty($promo_code_usage))
        {
            $promo_code_usage->using_times = $promo_code_usage->using_times + 1;
            $promo_code_usage->save();
        }
        else
        {
            $promo_code_usage = new Promo_code_usage();
            $promo_code_usage->user_id = Auth::user()->id;
            $promo_code_usage->promo_code_id = $promo_code_id;
            $promo_code_usage->using_times = 1;
            $promo_code_usage->save();
        }

        DB::table('total_promo_code_usage')->where('promo_code_id', $promo_code_id)->increment('using_times', 1);
    }
}

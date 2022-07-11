<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 11/5/2020
 * Time: 2:06 AM
 */

namespace App\Traits;


/**
 * Trait Payable
 * @package App\Traits
 */
trait Payable
{
    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsPaid($query)
    {
        return $query->where("is_paid", 1);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNotPaid($query)
    {
        return $query->where("is_paid", null);
    }
}

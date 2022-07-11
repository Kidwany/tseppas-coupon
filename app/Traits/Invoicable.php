<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 11/5/2020
 * Time: 2:06 AM
 */

namespace App\Traits;


trait Invoicable
{
    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsInvoiced($query)
    {
        return $query->where('invoice_id', '!=', null);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNotInvoiced($query)
    {
        return $query->where('invoice_id', null);
    }
}

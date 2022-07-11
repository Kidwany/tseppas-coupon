<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 11/5/2020
 * Time: 2:06 AM
 */

namespace App\Traits;


trait Activable
{
    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1);
    }
}

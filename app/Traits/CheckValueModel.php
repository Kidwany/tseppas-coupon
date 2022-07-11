<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Model;

/**
 * Trait CheckValueModel
 * @package App\Traits
 */
trait CheckValueModel
{
    /**
     * @param $model
     * @param $key
     * @param $value
     * @return mixed
     */
    public function getObject($model, $key, $value)
    {
        return $model::where($key, $value)->first();
    }
}

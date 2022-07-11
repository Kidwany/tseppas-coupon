<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $type
 * @property string $key
 * @property string $value
 * @property integer $is_active
*/
class CoreConfig extends Model
{
    protected $table = "core_config";
}

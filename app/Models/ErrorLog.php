<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $page_name
 * @property string $function_name
 * @property integer $Is_android_Web
 * @property string $error_message
 */

class ErrorLog extends Model
{
    /**
     * @var string
     */
    protected $table = 'error_log';

    /**
     * @var bool
     */
    public $timestamps = false;
}

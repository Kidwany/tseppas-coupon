<?php

namespace App\Models\Setting;

use App\Traits\Activable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Branches
 * @package App\Models\Setting
 */
class Branches extends Model
{
    use HasFactory, Activable, SoftDeletes;

    /**
     * @var string
     */
    protected $table = "branches";
}

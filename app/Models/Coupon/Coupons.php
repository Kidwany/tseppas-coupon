<?php

namespace App\Models\Coupon;

use App\Traits\Activable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Coupons extends Model
{
    use HasFactory, SoftDeletes, Activable, LogsActivity;

    protected $table = "coupons";
}

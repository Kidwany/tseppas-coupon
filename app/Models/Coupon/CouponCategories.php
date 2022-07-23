<?php

namespace App\Models\Coupon;

use App\Traits\Activable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class CouponCategories extends Model
{
    use HasFactory, Activable, SoftDeletes, LogsActivity;

    protected $table = "coupon_categories";
}

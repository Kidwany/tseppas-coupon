<?php

namespace App\Models\Product;

use App\Traits\Activable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, Activable, SoftDeletes;

    protected $table = "products";
}

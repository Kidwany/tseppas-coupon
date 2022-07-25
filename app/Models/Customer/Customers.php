<?php

namespace App\Models\Customer;

use App\Traits\Activable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory, Activable;

    protected $table = "customers";
}

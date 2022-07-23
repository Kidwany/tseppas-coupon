<?php

namespace App\Models\Sales;

use App\Traits\Activable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesType
 * @package App\Models\Sales
 */
class SalesType extends Model
{
    use HasFactory, Activable;

    /**
     * @var string
     */
    protected $table = "sales_type";

    /**
     * @var string[]
     */
    protected $fillable = ["name", "code"];

    /**
     * @var bool
     */
    public $timestamps = true;


}

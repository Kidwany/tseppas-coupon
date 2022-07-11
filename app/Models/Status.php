<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model  {

    public const IS_PUBLISHED       = 1;
    public const IS_PICKED_UP       = 3;
    public const IS_RUNNING         = 13;
    public const IS_ACTIVE          = 14;
    public const IS_DELIVERED       = 11;
    public const IS_CANCELLED       = 7;
    public const IS_Voucher_Created = 18;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'status';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['starts_in', 'due_date', 'updated_At'];

}

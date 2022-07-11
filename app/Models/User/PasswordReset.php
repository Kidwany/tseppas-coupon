<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $email
 * @property string $phone
 * @property string $token
 * @property string $created_at
*/
class PasswordReset extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'password_resets';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['type'];

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
    protected $dates = [];

    /**
     * @var bool
     */
    public $timestamps = false;

}

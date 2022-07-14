<?php

namespace App\Models;

use App\Models\Permissions\Permission;
use App\Models\Permissions\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * @property int $id
 * @property int $user_type_id
 * @property int $company_id
 * @property int $package_id
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $date_of_birth
 * @property string $name
 * @property string $mobile_token
 * @property string $api_token
 * @property string $password
 * @property string $code
 * @property int $gender
 * @property string $image_url
 * @property string $lang
 * @property string $platform
 * @property string $status_id
 * @property boolean $currently_available
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, \App\Traits\Permission;


    /**
     *
     */
    public const IS_USER = 1;
    /**
     *
     */
    public const IS_ADMIN = 2;
    /**
     *
     */
    public const IS_PARTNER = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        "created_at", "updated_at", "deleted_at"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, "role_id")->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, "user_has_permissions", "user_id", "permission_id");
    }
}

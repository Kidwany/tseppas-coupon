<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Role
 * @package App\Models\Permissions
 * @property int $id
 * @property string $name
 * @property string $guard_name
 */
class Role extends Model
{
    /**
     *
     */
    public const IS_SUPER_ADMIN = 1;
    /**
     *
     */
    public const IS_CALL_CENTER = 2;
    /**
     *
     */
    public const IS_TECHNICAL_SUPPORT = 3;
    /**
     *
     */
    public const IS_ACCOUNTANT = 4;
    /**
     *
     */
    public const IS_MARKETING = 5;
    /**
     *
     */
    public const IS_SERVICE_PROVIDER = 6;

    /**
     * @var string
     */
    protected $table = "roles";

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, "role_has_permissions", "role_id", "permission_id")
            ->select("permissions.id");
    }
}

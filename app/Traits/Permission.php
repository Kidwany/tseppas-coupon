<?php


namespace App\Traits;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\User;

/**
 * Trait Permission
 * @package App\Traits
 */
trait Permission
{
    /**
     * @param $permission
     * @param string $guard
     * @return bool
     */
    public function hasPermission($permission, $guard = "web")
    {
        $permissions = array();
        if (!empty(Cache::get("permissions" . \auth()->user()->id)))
        {
            $permissions = Cache::get("permissions" . \auth()->user()->id);
        }
        if (in_array($permission, $permissions))
            return true;
        return false;
    }

    /**
     * @param $role_id
     * @param null $user_id
     */
    public function assignRole($role_id, $user_id = null)
    {
        $user = User::where("id", $user_id)->first();
        $user->role_id = $role_id;
        $user->save();
    }

    /**
     * @param $permission_id
     */
    public function givePermissionTo($permission_id)
    {
        DB::table("user_has_permissions")->insert([
            "permission_id" => $permission_id,
            "user_id"   => \auth()->user()->id
        ]);
    }
}

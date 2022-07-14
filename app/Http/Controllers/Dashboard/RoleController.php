<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ErrorClass;
use App\Http\Controllers\Controller;
use App\Models\Permissions\Permission;
use App\Models\Permissions\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{

    public function index()
    {
        Gate::authorize("showAllRoles", Role::class);

        $roles = Role::all();
        return view("dashboard.role.index", compact("roles"));
    }


    public function create()
    {
        Gate::authorize("addNewRole", Role::class);

        $permissions = Permission::all();
        return view("dashboard.role.create", compact("permissions"));
    }

    public function store(Request $request)
    {
        Gate::authorize("addNewRole", Role::class);

        $this->validate($request, [
            "name" => "required",
            "permissions.*" => "required"
        ]);

        try {

            DB::beginTransaction();

            $role = new Role();
            $role->name = $request->name;
            $role->guard_name = "web";
            $role->save();

            $permissions_array = array();
            if (!empty($request->permissions))
            {
                foreach ($request->permissions as $permission)
                {
                    array_push($permissions_array, ["role_id" => $role->id, "permission_id" => $permission]);
                }
            }

            DB::table("role_has_permissions")->insert($permissions_array);

            DB::commit();
            return redirect(adminUrl("role"))->with("create", "تم اضافة المدير بنجاح");
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            $e = new ErrorClass();
            $e->Error_Save(__CLASS__, __FUNCTION__,
                $exception->getMessage() . '       line -> ' . $exception->getLine(), 0);
            return redirect()->back()->with("error", "حدث خطأ في حفظ البيانات من فضلك حاول مرة اخرى");
        }
    }

    public function edit($id)
    {
        $role = Role::with("permissions")->findOrFail($id);
        Gate::authorize("updateRole", $role);

        $permissions = Permission::all();
        return view("dashboard.role.edit", compact("role", "permissions"));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        Gate::authorize("updateRole", $role);

        $this->validate($request, [
            "name" => "required",
            "permissions.*" => "required"
        ]);

        try {

            DB::beginTransaction();

            $role->name = $request->name;
            $role->guard_name = "web";
            $role->save();

            DB::table("role_has_permissions")->where("role_id", $id)->delete();

            $permissions_array = array();
            if (!empty($request->permissions))
            {
                foreach ($request->permissions as $permission)
                {
                    array_push($permissions_array, ["role_id" => $role->id, "permission_id" => $permission]);
                }
            }

            DB::table("role_has_permissions")->insert($permissions_array);

            DB::commit();
            //return redirect(adminUrl("role"))->with("create", "تم اضافة المدير بنجاح");
            return redirect()->back()->with("create", "تم اضافة المدير بنجاح");
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            $e = new ErrorClass();
            $e->Error_Save(__CLASS__, __FUNCTION__,
                $exception->getMessage() . '       line -> ' . $exception->getLine(), 0);
            return redirect()->back()->with("error", "حدث خطأ في حفظ البيانات من فضلك حاول مرة اخرى");
        }
    }
}

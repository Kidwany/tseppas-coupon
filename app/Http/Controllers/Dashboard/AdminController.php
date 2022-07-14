<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Permissions\Permission;
use App\Models\Permissions\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

/**
 * Class AdminController
 * @package App\Http\Controllers\Dashboard
 */
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize("showAllAdmins", User::class);

        $users = User::with('status')->where('user_type_id', 3)->orderByDesc("created_at")->get();
        return view('dashboard.admin.index', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        Gate::authorize("addNewAdmin", User::class);

        $roles = Role::all();
        return view('dashboard.admin.create', compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize("addNewAdmin", User::class);

        $request->validate([
            'name'   =>  'required',
            'email'   =>  'required|unique:users,email',
            'password'   =>  'required|confirmed|min:8',
            'phone'   =>  'required',
            'role_id'   =>  'required',
        ], [] , [
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->user_type_id = 3;
        $user->status_id = 14;
        $user->save();

        $user->assignRole($request->role_id, $user->id);

        return redirect(adminUrl('admin'))->with('create', 'تمت اضافة مدير للتطبيق بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        Gate::authorize("updateAdmin", $user);

        $user = User::find($id);
        $roles = Role::all();
        return view('dashboard.admin.edit', compact('user', "roles"));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        Gate::authorize("updateAdmin", $user);

        $request->validate([
            'name'   =>  'required',
            'email'   =>  'required|unique:users,id,'. $id .'|max:100',
            'password'   =>  'required|confirmed|min:8',
            'phone'   =>  'required',
            'role_id'   =>  'required',
        ], [] , [
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();

        $user->assignRole($request->role_id, $user->id);

        return redirect(adminUrl('admin'))->with('update', 'تمت تعديل مدير للتطبيق بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        Gate::authorize("deleteAdmin", $user);

        $user->delete();

        return redirect(adminUrl('admin'))->with('update', 'تم حذف مدير للتطبيق بنجاح');
    }
}

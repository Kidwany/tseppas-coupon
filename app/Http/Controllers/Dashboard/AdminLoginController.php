<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{

    public function getLoginForm()
    {
        return view('dashboard.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email'         =>  'required',
            'password'      =>  'required',
        ], [] , [
            'email'         =>  'Email',
            'password'      =>  'Password',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type_id' => User::IS_ADMIN])) {
            // Save Permissions in Cache
            $cache_key = "permissions" . \auth()->user()->id;
            Cache::remember($cache_key, 60*60*60, function () {
                return User::query()
                    ->where("users.id", \auth()->user()->id)
                    ->join("role_has_permissions", "users.role_id", "=", "role_has_permissions.role_id")
                    ->join("permissions", "permissions.id", "=", "role_has_permissions.permission_id")
                    ->pluck("permissions.code")
                    ->toArray();
            });
            return redirect(adminUrl(\auth()->user()->role->redirect_url)) ?: redirect(adminUrl());
        }
        else
        {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }
    }

    public function username()
    {
        return 'email';
    }

    public function logout()
    {
        Cache::forget("permissions" . \auth()->user()->id);
        auth()->logout();
        // redirect to homepage
        return redirect('/login');
    }
}

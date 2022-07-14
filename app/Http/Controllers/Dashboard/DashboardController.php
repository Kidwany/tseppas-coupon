<?php


namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Dashboard
 */
class DashboardController
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //$orders = DB::table('orders')->count();
        $clients = User::all()->where('user_type_id', 1)->count();
        $stars = User::all()->where('user_type_id', 2)->count();
        return view('dashboard.welcome');
    }

}

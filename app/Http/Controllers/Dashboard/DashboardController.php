<?php


namespace App\Http\Controllers\Dashboard;


use App\Models\Order\Order;
use App\Models\Transaction;
use App\User;
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
        $orders = DB::table('orders')->count();
        $clients = User::all()->where('user_type_id', 1)->count();
        $stars = User::all()->where('user_type_id', 2)->count();
        $transactions = Transaction::all()->count();
        $latest_orders = Order::with('orderDetails', 'status', "client", "star", "type")
            ->whereDate("created_at", today())
            ->orderBy('created_at', 'desc')
            ->limit(20)
            ->get();
        $commission = DB::table("order_finance")->select("commission")->sum("commission");
        return view('dashboard.welcome',
            compact('orders', 'clients', 'stars', 'transactions', 'latest_orders', 'commission'));
    }

}

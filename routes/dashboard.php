<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminLoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\BranchesController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\SalesOrderController;
use App\Http\Controllers\Dashboard\SalesQuotationController;

Route::group(['namespace' => 'App\Http\Controllers\Dashboard', 'prefix' => 'main-dashboard', 'middleware' => 'auth'], function ()
{

    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('sales-quotations', 'SalesQuotationController');

    Route::resource('sales-orders', 'SalesOrderController');

    Route::resource('customers', 'CustomerController');

    Route::resource('coupons', 'CouponController');

    Route::resource('branches', 'BranchesController');

    /* Users Controller*/
    Route::resource('user', 'UserController');
    Route::get('user/{id}/disable', 'UserController@disable');

    /* Admin Controller*/
    Route::resource('admin', 'AdminController');

    /* Category Controller*/
    Route::resource('category', 'CategoryController');

    /* Admin Controller*/
    Route::resource('admin', 'AdminController');

    /* Messages */
    Route::get('message', 'MessageController@index');
    Route::get('message/{id}', 'MessageController@show');

    /*--------  Contact   --------*/
    Route::get('contact/edit', 'ContactController@edit');
    Route::patch('contact/update', 'ContactController@update');

    /*--------  About   --------*/
    Route::get('about/edit', 'AboutController@edit');
    Route::patch('about/update', 'AboutController@update');

    Route::get('logout', [AdminLoginController::class, 'logout']);

});

Route::get('login', [AdminLoginController::class, 'getLoginForm'])->name('login');
Route::get('logout', [AdminLoginController::class, 'logout']);

Route::post('admin-login', [AdminLoginController::class, 'authenticate']);

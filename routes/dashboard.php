<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminLoginController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::group(['namespace' => 'Dashboard', 'prefix' => 'main-dashboard', 'middleware' => 'auth'], function ()
{

    Route::get('/', [DashboardController::class, 'index']);

    /* Users Controller*/
    Route::resource('user', 'UserController');
    Route::get('user/{id}/disable', 'UserController@disable');
    Route::get('user/{id}/location', 'UserController@getLocation');

    /* Admin Controller*/
    Route::resource('admin', 'AdminController');

    /* Notification Controller*/
    Route::resource('notification', 'NotificationController');

    /* Category Controller*/
    Route::resource('category', 'CategoryController');

    Route::get('register-requests', 'RegisterRequestsController@index');

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

    Route::get('logout', 'AdminLoginController@logout');

});

Route::get('login', [AdminLoginController::class, 'getLoginForm'])->name('login');
Route::get('logout', 'Dashboard\AdminLoginController@logout');

Route::post('admin-login', [AdminLoginController::class, 'authenticate']);

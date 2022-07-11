<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\PhoneController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Auth\DeleteUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
:::::::::::::::::::::::::::: Auth Routes ::::::::::::::::::::::::::::::::::
:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
Route::group(['prefix' => 'v1/auth'], function() {
    // Login Api
    Route::post('login', [LoginController::class, 'attempt']);
    // Register Api
    Route::post('register', [RegisterController::class, 'register']);
    // Verify
    Route::post('check-phone', [PhoneController::class, 'check']);
    // Reset Password Api
    Route::post('generate-token', [ForgotPasswordController::class, 'generate']);
    // Reset Password Api
    Route::post('reset-password/{token}', [ForgotPasswordController::class, 'reset']);
    // Delete User Api
    Route::delete('delete-user/{id}', [DeleteUserController::class, 'delete']);
});

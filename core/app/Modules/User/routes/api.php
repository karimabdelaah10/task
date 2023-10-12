<?php

use App\Modules\User\Auth\Api\Controllers\AuthApiController;
use Illuminate\Support\Facades\Route;

Route::group([

//    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthApiController::class, 'login']);
    Route::post('logout', [AuthApiController::class, 'logout']);
    Route::post('register', [AuthApiController::class, 'register']);
    Route::post('confirm-otp', [AuthApiController::class, 'confirmOtp']);
//    Route::post('me', [AuthApiController::class, 'me']);

});

<?php

use App\Modules\BaseApp\Enums\BaseAppEnums;
use App\Modules\Country\Api\Controllers\CountryApiController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => BaseAppEnums::COUNTRY_MODULE_PREFIX,
    ],
    function () {
        Route::get('/', [CountryApiController::class, 'index']);
        Route::post('/create', [CountryApiController::class, 'stor']);
    });

<?php

use App\Modules\BaseApp\Enums\BaseAppEnums;
use App\Modules\Profile\Api\Controllers\ProfileApiController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => BaseAppEnums::PROFILE_MODULE_PREFIX,
    ],
    function () {
        Route::get('/', [ProfileApiController::class, 'index']);
    });

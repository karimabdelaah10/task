<?php

use App\Modules\BaseApp\Enums\BaseAppEnums;
use App\Modules\Profile\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => BaseAppEnums::PROFILE_MODULE_PREFIX,
        'as' => BaseAppEnums::PROFILE_MODULE_PREFIX . '.',
        'middleware' => ['web', 'auth']
    ],
    function () {
        Route::get('/edit', [ProfileController::class, 'getEdit'])->name('getEdit');
        Route::post('/update', [ProfileController::class, 'postUpdate'])->name('postUpdate');

    });

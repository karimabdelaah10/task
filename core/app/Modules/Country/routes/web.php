<?php

use App\Modules\BaseApp\Enums\BaseAppEnums;
use App\Modules\Country\Admin\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => BaseAppEnums::COUNTRY_MODULE_PREFIX,
        'as' => BaseAppEnums::COUNTRY_MODULE_PREFIX . '.',
        'middleware' => ['web', 'auth']
    ],
    function () {
        Route::get('/', [CountryController::class, 'index'])->name('index');
        Route::get('/show/{countryId}', [CountryController::class, 'show'])->name('show');
        Route::get('/create', [CountryController::class, 'getCreate'])->name('getCreate');
        Route::post('/store', [CountryController::class, 'postCreate'])->name('postCreate');
        Route::get('/edit/{countryId}', [CountryController::class, 'getEdit'])->name('getEdit');
        Route::post('/update/{countryId}', [CountryController::class, 'postUpdate'])->name('postUpdate');
        Route::delete('/delete/{countryId}', [CountryController::class, 'delete'])->name('delete');

    });

<?php

use App\Http\Controllers\ProfileController;
use App\Modules\BaseApp\Enums\BaseAppEnums;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::group([
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/dashboard', function () {
        $data['moduleName'] = 'DASHBOARD';
        return view('dashboard', $data);
    })->name('dashboard');
    require base_path('app/Modules/Country/routes/web.php');
    require base_path('app/Modules/Profile/routes/web.php');
});

<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/pasien', PasienController::class);
    Route::resource('/pendaftaran', DaftarController::class);
    Route::resource('/dokter', DokterController::class);
    Route::resource('/poli', PoliController::class);
    Route::get('/pendaftaran/{id}/daftar', [DaftarController::class, 'create']);

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/coba', function () {
            return view('coba');
        });
    });
});

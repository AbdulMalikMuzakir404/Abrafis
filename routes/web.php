<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Xirpl1Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChangepassController;
use App\Http\Controllers\RekapAbsenController;

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

Route::get('/', [LoginController::class, 'showLoginForm']);

Route::group(['prefix' => 'profile'], function(){
    Route::get('/changepass', [ChangepassController::class, 'changepass'])->name('changepass')->middleware('auth');
    Route::post('/changepassproses', [ChangepassController::class, 'changepassproses'])->name('changepassproses')->middleware('auth');
    Route::post('/changeemailproses', [ChangepassController::class, 'changeemailproses'])->name('changeemailproses')->middleware('auth');
});

Route::group(['prefix' => 'home'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/rekapabsen', [RekapAbsenController::class, 'index'])->name('rekapabsen')->middleware('auth');
    Route::get('/xirpl1', [Xirpl1Controller::class, 'index'])->name('xirpl1')->middleware('auth');
});

Auth::routes();

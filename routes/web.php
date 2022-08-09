<?php

use App\Events\SendLocation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataTableAlfa;
use App\Http\Controllers\faqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\aboutcontroller;
use App\Http\Controllers\HadirController;
use App\Http\Controllers\SakitController;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\xiirpl1Contoller;
use App\Http\Controllers\Xirpl1Controller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MidtransConstoller;
use App\Http\Controllers\peringkatController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChangepassController;
use App\Http\Controllers\RekapAbsenController;
use App\Http\Controllers\RegisterAdminContoller;

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

Route::get('/register/admin', [RegisterAdminContoller::class, 'getRegister'])->name('getregister');
Route::post('/register/admin', [RegisterAdminContoller::class, 'postRegister'])->name('postregister');


Route::middleware(['auth', 'verified'])->group(function (){
    Route::group(['prefix' => 'profile'], function(){
        Route::get('/changepass', [ChangepassController::class, 'changepass'])->name('changepass');
        Route::get('/deleteimage', [ChangepassController::class, 'deleteimage'])->name('deleteimage');
        Route::post('/changeimage', [ChangepassController::class, 'changeimage'])->name('changeimage');
        Route::post('/changepassproses', [ChangepassController::class, 'changepassproses'])->name('changepassproses');
        Route::post('/changeemailproses', [ChangepassController::class, 'changeemailproses'])->name('changeemailproses');
    });
});


Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::group(['prefix' => 'admin'] , function(){
        Route::get('/xiirpl1', [xiirpl1Contoller::class, 'index'])->name('xiirpl1');
        Route::get('/multimedia', [xiirpl1Contoller::class, 'multimedia'])->name('multimedia');
        Route::get('/elektro', [xiirpl1Contoller::class, 'elektro'])->name('elektro');

        Route::get('/update/data/{id}', [xiirpl1Contoller::class, 'update'])->name('update');
    });
});


Route::middleware('auth')->group(function (){
    Route::group(['prefix' => 'home'], function (){
        Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
        Route::get('/faq', [faqController::class, 'showFaq'])->name('faq');
        Route::get('/about', [aboutcontroller::class, 'showAbout'])->name('about');
    });
});


Route::middleware('auth', 'verified')->group(function (){
    Route::group(['prefix' => 'home'], function() {
     Route::get('/home', [HomeController::class, 'index'])->name('home');
    });
});


Route::middleware(['auth', 'verified', 'user'])->group(function() {
    Route::group(['prefix' => 'home'], function(){
        Route::get('/rekapabsen', [RekapAbsenController::class, 'index'])->name('rekapabsen');

        Route::get('/peringkat', [peringkatController::class, 'showPeringkat'])->name('peringkat');

        Route::get('/hadir', [HadirController::class, 'hadir'])->name('hadir');
        Route::get('/kode/hadir', [HadirController::class, 'kodeHadir'])->name('kodehadir');
        Route::get('/data/hadir', [HadirController::class, 'dataHadir'])->name('datahadir');

        Route::get('/generate/sakit', [SakitController::class, 'generateSakit'])->name('suratsakit');
        Route::post('/sakit', [SakitController::class, 'sakit'])->name('sakit');
        Route::get('/kode/sakit', [SakitController::class, 'kodeSakit'])->name('kodesakit');
        Route::post('/kode/sakit/aksi', [SakitController::class, 'kodeSakitAksi'])->name('kodesakitaksi');
        Route::get('/data/sakit', [SakitController::class, 'dataSakit'])->name('datasakit');

        Route::get('/generate/izin', [IzinController::class, 'generateIzin'])->name('suratizin');
        Route::post('/izin', [IzinController::class, 'izin'])->name('izin');
        Route::get('/kode/izin', [IzinController::class, 'kodeIzin'])->name('kodeizin');
        Route::post('/kode/izin/aksi', [IzinController::class, 'kodeIzinAksi'])->name('kodeizinaksi');
        Route::get('/data/izin', [IzinController::class, 'dataIzin'])->name('dataizin');

        Route::get('/alfa', [dataTableAlfa::class, 'alfa'])->name('alfa');
    });
});


// Route::get('/a', function (){
//     return view('coba');
// });

// Route::get('/b', function (){
//     event(new SendLocation('lorem ipsum dolor sit amet'));
// });

// Broadcast::routes();

// Route::get('/midtrans', [MidtransConstoller::class, 'index']);


Auth::routes(['verify'=>true]);

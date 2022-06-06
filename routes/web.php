<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('registrasi.index');
// });

Route::get('/tes', function () {
    return view('index');
});

Route::get('/', [DashboardController::class, 'index']);

Route::get('/registrasi1', [RegistrasiController::class, 'index']);

Route::post('/registrasi1', [RegistrasiController::class, 'index']);

Route::get('/registrasi2', [RegistrasiController::class, 'index2']);

Route::post('/registrasi2', [RegistrasiController::class, 'index2']);

Route::post('/reg1', 'App\Http\Controllers\RegistrasiController@store');

Route::post('/ttdTamu', [RegistrasiController::class, 'ttdTamu']);

Route::post('/reg2', 'App\Http\Controllers\RegistrasiController@store2');

Route::post('/ttdInstruksi', [RegistrasiController::class, 'ttdInstruksi']);

Route::get('/table', 'App\Http\Controllers\TableController@index');

Route::post('/table', 'App\Http\Controllers\TableController@index');

Route::post('/table/sort', [TableController::class, 'show']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::post('/chart', [ChartController::class, 'index']);

Route::post('/hapusResepsionis', [AdminController::class, 'hapusResepsionis']);

Route::post('/hapusKeperluan', [AdminController::class, 'hapusKeperluan']);

Route::post('/formEdit', [AdminController::class, 'formEdit']);

Route::post('/editResepsionis', [AdminController::class, 'editResepsionis']);

Route::post('/editKeperluan', [AdminController::class, 'editKeperluan']);

Route::post('/formTambah', [AdminController::class, 'formTambah']);

Route::post('/tambahResepsionis', [AdminController::class, 'tambahResepsionis']);

Route::post('/tambahKeperluan', [AdminController::class, 'tambahKeperluan']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

Route::get('/cetak_pdf', [TableController::class, 'cetak_pdf']);

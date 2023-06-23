<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\IbuHamilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VitaminController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PenimbanganController;
use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\LoginController;

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


Route::get('/', [HomeController::class, 'index']);


// Login & Logout
// Route::controller(LoginController::class)->group(function () {
//   Route::get('login', 'index')->name('login');
// });

Route::get('home', [HomeController::class, 'index'])->name('home');

// Middleware Login

// });
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::group(['middleware' => ['auth:sanctum', 'auth.role']], function () {
  Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

  Route::resource('user', UserController::class);
  Route::resource('ibuhamil', IbuHamilController::class);
  Route::resource('balita', BalitaController::class)->parameters([
    'balita' => 'balita'
  ]);;
  Route::resource('jadwal', JadwalController::class);
  Route::resource('vitamin', VitaminController::class);
  Route::resource('imunisasi', ImunisasiController::class);
  Route::resource('pemeriksaan', PemeriksaanController::class);
  Route::resource('penimbangan', PenimbanganController::class);

  Route::prefix('cetak/pdf/')->as('cetak.pdf.')->middleware(['auth:sanctum', 'auth.role:admin'])->group(function () {
    Route::get('user', [UserController::class, 'cetak_pdf'])->name('user');
    Route::get('ibuhamil', [IbuHamilController::class, 'cetak_pdf'])->name('ibuhamil');
    Route::get('balita', [BalitaController::class, 'cetak_pdf'])->name('balita');
    Route::get('jadwal', [JadwalController::class, 'cetak_pdf'])->name('jadwal');
    Route::get('vitamin', [VitaminController::class, 'cetak_pdf'])->name('vitamin');
    Route::get('pemeriksaan', [PemeriksaanController::class, 'cetak_pdf'])->name('pemeriksaan');
    Route::get('penimbangan', [PenimbanganController::class, 'cetak_pdf'])->name('penimbangan');
    Route::get('imunisasi', [ImunisasiController::class, 'cetak_pdf'])->name('imunisasi');
  });

  // Route::prefix('autocomplete')->as('autocomplete.')->controller(AutocompleteController::class)->group(function () {
  //   Route::get('ibuHamil', 'getIbuHamil')->name('ibuHamil');
  // });
});

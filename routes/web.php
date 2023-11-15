<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\PosisiController;
use App\Http\Controllers\Dashboard\AbsensiController;
use App\Http\Controllers\Dashboard\JabatanController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\KaryawanController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DatapenggunaController;

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

Route::get('/', function () {
    return view('index');
});

// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/dashboard', DashboardController::class)->except('create', 'edit')->middleware('auth');

// Data Karyawan
Route::resource('/karyawan', KaryawanController::class)->except('create', 'edit', 'show')->middleware('auth');

// Data Jabatan
Route::resource('/jabatan', JabatanController::class)->middleware('auth');

// Data Posisi
Route::resource('/posisi', PosisiController::class)->middleware('auth');
Route::get('/posisi/{jabatan_id}', [PosisiController::class, 'detail'])->name('posisi')->middleware('auth');

Route::resource('/absensi', AbsensiController::class)->middleware('auth');
Route::get('/absensi/export', 'AbsensiController@export')->name('absensi.export')->middleware('auth');

// Pengguna Baru
Route::resource('/datapengguna', DatapenggunaController::class)->except('show', 'create')->middleware('staff');
Route::patch('/penggunaupdate/{id}', [DatapenggunaController::class, 'penggunaupdate'])->name('datapengguna.update');

// Profile
Route::get('/userprofile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
Route::get('/userprofileedit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::patch('/prof/{id}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::post('/password', [ProfileController::class, 'password_action'])->name('password.action')->middleware('auth');

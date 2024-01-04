<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Layanan
Route::prefix('layanan')->group(function () {
    Route::get('/', [LayananController::class, 'index']);
    Route::get('//creata', [LayananController::class, 'create']);
    Route::post('/store', [LayananController::class, 'store']);
    Route::get('/edit/{id}', [LayananController::class, 'edit']);
    Route::patch('/edit/{id}', [LayananController::class, 'update']);
    Route::get('/delete/{id}', [LayananController::class, 'destroy']);
});

// Pelanggan
Route::prefix('pelanggan')->group(function () {
    Route::get('/', [PelangganController::class, 'index']);
    Route::get('/creata', [PelangganController::class, 'create']);
    Route::post('/store', [PelangganController::class, 'store']);
    Route::get('/edit/{id}', [PelangganController::class, 'edit']);
    Route::patch('/edit/{id}', [PelangganController::class, 'update']);
    Route::get('/delete/{id}', [PelangganController::class, 'destroy']);
});

// Transaksi
Route::prefix('transaksi')->group(function () {
    Route::get('/', [TransaksiController::class, 'index']);
    Route::get('/create', [TransaksiController::class, 'create']);
    Route::post('/store', [TransaksiController::class, 'store']);
    Route::get('/edit/{id}', [TransaksiController::class, 'edit']);
    Route::patch('/edit/{id}', [TransaksiController::class, 'update']);
    Route::get('/delete/{id}', [TransaksiController::class, 'destroy']);
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/', function () {
    return redirect('/login');
});

// sementara TANPA middleware dulu
Route::resource('pegawai', PegawaiController::class)->except(['show']);

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/cetak', [PegawaiController::class, 'cetak'])->name('pegawai.cetak');

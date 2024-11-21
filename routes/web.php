<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/beranda', [HomeController::class, 'index'])->name('home');
Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan');
Route::get('/shodaqoh', [HomeController::class, 'shodaqoh'])->name('shodaqoh');
Route::get('/laporan', [HomeController::class, 'laporan'])->name('laporan');
Route::get('/jadwalsholat', [HomeController::class, 'jadwalsholat'])->name('jadwalsholat');

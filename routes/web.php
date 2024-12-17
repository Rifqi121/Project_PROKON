<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\App;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/beranda', [HomeController::class, 'index'])->name('home');
Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan');
Route::get('/shodaqoh', [HomeController::class, 'shodaqoh'])->name('shodaqoh');
Route::get('/laporan', [HomeController::class, 'laporan'])->name('laporan');
Route::get('/jadwalsholat', [HomeController::class, 'jadwalsholat'])->name('jadwalsholat');

Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin');
Route::post('login', [AuthController::class, 'auth'])->name('login');

Route::get('/admin/layanan', [ServiceController::class, 'index'])->name('adminLayanan');
Route::post('/admin/layanan', [ServiceController::class, 'store'])->name('layanan.store');
Route::put('/admin/layanan/{service}', [ServiceController::class, 'update'])->name('layanan.update');
Route::delete('/admin/layanan/{service}', [ServiceController::class, 'delete'])->name('layanan.delete');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/pengumuman', [AdminController::class, 'pengumuman'])->name('adminPengumuman');
Route::get('/admin/jadwalkajian', [AdminController::class, 'kajian'])->name('adminJadwalKajian');
Route::get('/admin/jadwaljumat', [AdminController::class, 'jadwaljumat'])->name('adminJadwalJumat');
Route::get('/admin/agenda', [AdminController::class, 'agenda'])->name('adminAgenda');
Route::get('/admin/shodaqoh', [AdminController::class, 'shodaqoh'])->name('adminShodaqoh');
Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('adminLaporan');
Route::get('/admin/jadwalsholat', [AdminController::class, 'jadwalsholat'])->name('adminJadwalsholat');
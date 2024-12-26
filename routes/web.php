<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\App;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/beranda', [HomeController::class, 'index'])->name('home');
Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan');
Route::get('/shodaqoh', [HomeController::class, 'shodaqoh'])->name('shodaqoh');
Route::get('/laporan', [HomeController::class, 'laporan'])->name('laporan');
Route::get('/jadwalsholat', [HomeController::class, 'jadwalsholat'])->name('jadwalsholat');
Route::get('/layanan', [HomeController::class, 'layanan'])->name('layanan');
Route::get('/pengumuman', [HomeController::class, 'pengumuman'])->name('pengumuman');
Route::get('/agenda', [HomeController::class, 'agenda'])->name('agenda');
Route::get('/jadwaljumat', [HomeController::class, 'jadwaljumat'])->name('jadwaljumat');
Route::get('/jadwalkajian', [HomeController::class, 'jadwalkajian'])->name('jadwalkajian');

Route::get('/login', [AdminController::class, 'auth'])->name('admin');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/layanan', [AdminController::class, 'layanan'])->name('adminLayanan');
Route::get('/admin/pengumuman', [AdminController::class, 'pengumuman'])->name('adminPengumuman');
Route::get('/admin/jadwalkajian', [AdminController::class, 'kajian'])->name('adminJadwalKajian');
Route::get('/admin/jadwaljumat', [AdminController::class, 'jadwaljumat'])->name('adminJadwalJumat');
Route::get('/admin/agenda', [AdminController::class, 'agenda'])->name('adminAgenda');
Route::get('/admin/shodaqoh', [AdminController::class, 'shodaqoh'])->name('adminShodaqoh');
Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('adminLaporan');
Route::get('/admin/jadwalsholat', [AdminController::class, 'jadwalsholat'])->name('adminJadwalsholat');
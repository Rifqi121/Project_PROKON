<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JumatScheduleController;
use App\Http\Controllers\KajianController;
use App\Http\Controllers\MyQuranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use App\Models\Agenda;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\App;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/admin/layanan', [ServiceController::class, 'index'])->name('adminLayanan');
    Route::post('/admin/layanan', [ServiceController::class, 'store'])->name('layanan.store');
    Route::put('/admin/layanan/{service}', [ServiceController::class, 'update'])->name('layanan.update');
    Route::delete('/admin/layanan/{service}', [ServiceController::class, 'delete'])->name('layanan.delete');
    
    Route::get('/admin/inventaris', [InventarisController::class, 'index'])->name('inventaris');
    Route::post('/admin/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
    Route::put('/admin/inventaris/{inventaris}', [InventarisController::class, 'update'])->name('inventaris.update');
    Route::delete('/admin/inventaris/{inventaris}', [InventarisController::class, 'delete'])->name('inventaris.delete');
    
    Route::get('/admin/kematian', [DeathController::class, 'index'])->name('death');
    Route::post('/admin/kematian', [DeathController::class, 'store'])->name('death.store');
    Route::put('/admin/kematian/{kematian}', [DeathController::class, 'update'])->name('death.update');
    Route::delete('/admin/kematian/{kematian}', [DeathController::class, 'delete'])->name('death.delete');
    
    Route::get('/admin/DataKegiatan/Pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
    Route::post('/admin/DataKegiatan/Pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::put('/admin/DataKegiatan/Pengumuman/{pengumuman}', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::delete('/admin/DataKegiatan/Pengumuman/{pengumuman}', [PengumumanController::class, 'delete'])->name('pengumuman.delete');
    
    Route::get('/admin/DataKegiatan/JadwalJumat', [JumatScheduleController::class, 'index'])->name('JumatSchedules');
    Route::post('/admin/DataKegiatan/JadwalJumat', [JumatScheduleController::class, 'store'])->name('JumatSchedules.store');
    Route::put('/admin/DataKegiatan/JadwalJumat/{JumatSchedule}', [JumatScheduleController::class, 'update']);
    Route::delete('/admin/DataKegiatan/JadwalJumat/{JumatSchedule}', [JumatScheduleController::class, 'delete'])->name('JumatSchedules.delete');
    
    Route::get('/admin/DataKegiatan/Agenda', [AgendaController::class, 'index'])->name('agenda');
    Route::post('/admin/DataKegiatan/Agenda', [AgendaController::class, 'store'])->name('agenda.store');
    Route::put('/admin/DataKegiatan/Agenda/{agenda}', [AgendaController::class, 'update'])->name('agenda.update');
    
    Route::get('/admin/DataKegiatan/Laporan', [ReportController::class, 'index'])->name('laporan');
    Route::post('/admin/DataKegiatan/Laporan', [ReportController::class, 'store'])->name('laporan.store');
    Route::put('/admin/DataKegiatan/Laporan/{report}', [ReportController::class, 'update'])->name('laporan.update');
    Route::delete('/admin/DataKegiatan/Laporan/{report}', [ReportController::class, 'delete'])->name('laporan.delete');
    
    Route::get('/admin/DataKegiatan/Kajian', [KajianController::class, 'index'])->name('kajian');
    Route::post('/admin/DataKegiatan/Kajian', [KajianController::class, 'store'])->name('kajian.store');
    Route::put('/admin/DataKegiatan/Kajian/{kajian}', [KajianController::class, 'update'])->name('kajian.update');
    Route::delete('/admin/DataKegiatan/Kajian/{kajian}', [KajianController::class, 'delete'])->name('kajian.delete');
    
    Route::get('/admin/pengumuman', [AdminController::class, 'pengumuman'])->name('adminPengumuman');
    Route::get('/admin/jadwalkajian', [AdminController::class, 'kajian'])->name('adminJadwalKajian');
    Route::get('/admin/jadwaljumat', [AdminController::class, 'jadwaljumat'])->name('adminJadwalJumat');
    Route::get('/admin/agenda', [AdminController::class, 'agenda'])->name('adminAgenda');
    Route::get('/admin/shodaqoh', [AdminController::class, 'shodaqoh'])->name('adminShodaqoh');
    Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('adminLaporan');
    Route::get('/admin/jadwalsholat', [AdminController::class, 'jadwalsholat'])->name('adminJadwalsholat');
});

Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login.post');

Route::get('/sholat/jadwal/{kota}/{tahun}/{bulan}/{tanggal}', [MyQuranController::class, 'jadwalSholat']);
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
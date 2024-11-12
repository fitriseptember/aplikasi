<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanKegiatanController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login'); // Route ke halaman login


Route::get('admin/create', [AkunController::class, 'create'])->name('akun.create');
Route::post('akun/store', [AkunController::class, 'store'])->name('akun.store');
Route::get('admin/list', [AkunController::class, 'index'])->name('admin.list');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes for each role
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
Route::get('/mitra/dashboard', [MitraController::class, 'index'])->name('mitra.dashboard');
Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');

Route::prefix('siswa')->group(function () {
    Route::get('absen/create', [AttendanceController::class, 'create'])->name('absen.create'); // Menampilkan form absensi
    Route::post('absen', [AttendanceController::class, 'store'])->name('absen.store'); // Menyimpan data absensi
    Route::get('absen/latest', [AttendanceController::class, 'showLatest'])->name('absen.showLatest'); // Menampilkan data absensi terbaru
   
  Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

     Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
     Route::get('/mitra/dashboard', [MitraController::class, 'index'])->name('mitra.dashboard');
    });

    // PKL activity report routes
    Route::get('laporan/create', [LaporanKegiatanController::class, 'create'])->name('laporan.create');
    Route::post('laporan/store', [LaporanKegiatanController::class, 'store'])->name('laporan.store');
Route::get('/admin/dashboard', [AdminController::class, 'laporan'])->name('admin.dashboard');
Route::get('/mitra/dashboard', [MitraController::class, 'laporan'])->name('mitra.dashboard');
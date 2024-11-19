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


// routes/web.php
// Route untuk halaman Absen Siswa
Route::get('/siswa/absensi', function () {
    return view('siswa.absenSiswa'); // Menampilkan file siswa/absenSiswa.blade.php
})->name('siswa.absensi');

// Route untuk halaman Laporan Siswa
Route::get('/siswa/laporan', function () {
    return view('siswa.laporanSiswa'); // Menampilkan file siswa/laporanSiswa.blade.php
})->name('siswa.laporan');

// Route untuk halaman Content
Route::get('/siswa/content', function () {
    return view('siswa.content'); // Menampilkan file siswa/content.blade.php
})->name('siswa.content');

// Route untuk halaman Dashboard Admin
Route::get('/admin/content', function () {
    return view('admin.content'); // Menampilkan file admin/content.blade.php
})->name('admin.content');


// Route untuk halaman Input Akun Admin
Route::get('/admin/create', [AkunController::class, 'create'])->name('admin.create');

// Route untuk halaman Daftar Akun Admin
Route::get('/admin/list', [AkunController::class, 'index'])->name('admin.list');

// Route untuk menyimpan akun baru
Route::post('/admin/store', [AkunController::class, 'store'])->name('admin.store');

// Route untuk halaman Absensi Siswa Admin
Route::get('/admin/tabelAbsen', function () {
    return view('admin.dataAbsen'); // Menampilkan file admin/tabelAbsen.blade.php
})->name('admin.dataAbsen');

// Route untuk halaman Laporan Siswa Admin
Route::get('/admin/tabelLaporan', function () {
    return view('admin.dataLaporan'); // Menampilkan file admin/tabelLaporan.blade.php
})->name('admin.dataLaporan');



// Route untuk halaman Dashboard Mitra
Route::get('/mitra/content', function () {
    return view('mitra.content'); // Menampilkan file mitra/content.blade.php
})->name('mitra.content');

// Route untuk halaman Data Absen Mitra
Route::get('/mitra/dataAbsen', function () {
    return view('mitra.dataAbsen'); // Menampilkan file mitra/dataAbsen.blade.php
})->name('mitra.dataAbsen');

// Route untuk halaman Data Laporan Kegiatan Mitra
Route::get('/mitra/datalaporan', function () {
    return view('mitra.dataLaporan'); // Menampilkan file mitra/dataLaporan.blade.php
})->name('mitra.datalaporan');


// Route untuk halaman Dashboard Guru
Route::get('/guru/content', function () {
    return view('guru.content'); // Menampilkan file guru/content.blade.php
})->name('guru.content');

// Route untuk halaman Profil Guru
Route::get('/guru/profil', function () {
    return view('guru.profil'); // Menampilkan file guru/profil.blade.php
})->name('guru.profil');

// Route untuk halaman Data Absen Guru
Route::get('/guru/dataAbsen', function () {
    return view('guru.dataAbsen'); // Menampilkan file guru/dataAbsen.blade.php
})->name('guru.dataAbsen');

// Route untuk halaman Daftar Siswa Guru
Route::get('/guru/datadaftarsiswa', function () {
    return view('guru.datadaftarsiswa'); // Menampilkan file guru/dataDaftarSiswa.blade.php
})->name('guru.datadaftarsiswa');

// Route untuk halaman Data Laporan Kegiatan Guru
Route::get('/guru/datalaporan', function () {
    return view('guru.dataLaporan'); // Menampilkan file guru/dataLaporan.blade.php
})->name('guru.dataLaporan');






// Route ke halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');

// Route autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/data-login', [AuthController::class, 'getLoginData']);



// Route dashboard untuk setiap role
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/guru/dashboard', [GuruController::class, 'dashboard'])->name('guru.dashboard');
Route::get('/mitra/dashboard', [MitraController::class, 'dashboard'])->name('mitra.dashboard');
Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');

// Route absensi untuk siswa
Route::prefix('siswa')->group(function () {
    Route::get('absen/create', [AttendanceController::class, 'create'])->name('absen.create'); // Menampilkan form absensi
    Route::post('absen', [AttendanceController::class, 'store'])->name('absen.store'); // Menyimpan data absensi
    Route::get('absen/latest', [AttendanceController::class, 'showLatest'])->name('absen.showLatest'); // Menampilkan data absensi terbaru
});

// Route laporan kegiatan PKL
Route::get('laporan/create', [LaporanKegiatanController::class, 'create'])->name('laporan.create');
Route::post('laporan/store', [LaporanKegiatanController::class, 'store'])->name('laporan.store');

// Route tambahan untuk laporan di dashboard
Route::get('/admin/dashboard/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
Route::get('/guru/dashboard/laporan', [GuruController::class, 'laporan'])->name('guru.laporan');
Route::get('/mitra/dashboard/laporan', [MitraController::class, 'laporan'])->name('mitra.laporan');

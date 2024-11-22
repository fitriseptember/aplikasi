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



// Route untuk halaman absen
Route::get('/siswa/absensi', [AttendanceController::class, 'index'])->name('siswa.absensi');

// Route untuk menyimpan data absensi
Route::post('/siswa/absensi', [AttendanceController::class, 'store'])->name('absen.store');

Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');



// Route untuk menampilkan form laporan kegiatan (PKL)
Route::get('/siswa/laporan/create', [LaporanKegiatanController::class, 'create'])->name('laporan.create');

// Route untuk menyimpan laporan kegiatan (PKL)
Route::post('/siswa/laporan/store', [LaporanKegiatanController::class, 'store'])->name('laporan.store');

// Route untuk menampilkan daftar laporan kegiatan yang sudah dikirim
Route::get('/siswa/laporan', [LaporanKegiatanController::class, 'index'])->name('laporan.index');



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
Route::get('/admin/tabelAbsen', [AdminController::class, 'tabelAbsen'])->name('admin.dataAbsen');

// Route untuk halaman Laporan Siswa Admin
Route::get('/admin/dataLaporan', [AdminController::class, 'laporanKegiatan'])->name('admin.dataLaporan');




// Route untuk halaman Dashboard Mitra
Route::get('/mitra/content', function () {
    return view('mitra.content'); // Menampilkan file mitra/content.blade.php
})->name('mitra.content');

// Route untuk halaman Data Absen Mitra
Route::get('/mitra/tabelAbsen', [MitraController::class, 'tabelAbsen'])->name('mitra.dataAbsen');

// Route untuk halaman Data Laporan Kegiatan Mitra
Route::get('/mitra/dataLaporan', [MitraController::class, 'laporanKegiatan'])->name('mitra.datalaporan');

// Route untuk halaman Dashboard Guru
Route::get('/guru/content', function () {
    return view('guru.content'); // Menampilkan file guru/content.blade.php
})->name('guru.content');

// Route untuk halaman Profil Guru
Route::get('/guru/profil', function () {
    return view('guru.profil'); // Menampilkan file guru/profil.blade.php
})->name('guru.profil');

// Route untuk halaman Data Absen Guru
Route::get('/guru/tabelAbsen', [GuruController::class, 'tabelAbsen'])->name('guru.dataAbsen');

// Route untuk halaman Daftar Siswa Guru
Route::get('/guru/datadaftarsiswa', [GuruController::class, 'dataDaftarSiswa'])->name('guru.datadaftarsiswa');



// Route untuk halaman Data Laporan Kegiatan Guru
Route::get('/guru/dataLaporan', [GuruController::class, 'laporanKegiatan'])->name('guru.dataLaporan');


// Route ke halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');

// Route autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');




// Route dashboard untuk setiap role
Route::get('/admin/content', [AdminController::class, 'dashboard'])->name('admin.content');
Route::get('/guru/content', [GuruController::class, 'dashboard'])->name('guru.content');
Route::get('/mitra/content', [MitraController::class, 'dashboard'])->name('mitra.content');
Route::get('/siswa/content', [SiswaController::class, 'index'])->name('siswa.content');

//Route Diagram Kehadiran
Route::get('/siswa/content', [SiswaController::class, 'content'])->name('siswa.content');
Route::get('/guru/content', [GuruController::class, 'content'])->name('guru.content');
Route::get('/mitra/content', [MitraController::class, 'content'])->name('mitra.content');
Route::get('/admin/content', [AdminController::class, 'content'])->name('admin.content');
Route::get('/kunjungan', [AuthController::class, 'kunjungan']);






Route::get('/get-login-data', [AuthController::class, 'getLoginData']);





Route::get('/siswa/content', [SiswaController::class, 'acclaporan'])->name('siswa.content');
Route::post('/laporan/acc', [LaporanKegiatanController::class, 'acc'])->name('laporan.acc');

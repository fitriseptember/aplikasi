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
use App\Http\Controllers\TempatPklController;
use Illuminate\Support\Facades\Route;

// Rute halaman absensi siswa
Route::get('/siswa/absensi', [AttendanceController::class, 'index'])->name('siswa.absensi');
Route::post('/siswa/absensi', [AttendanceController::class, 'store'])->name('absen.store');
Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');

// Rute untuk laporan kegiatan (PKL)
Route::get('/siswa/laporan/create', [LaporanKegiatanController::class, 'create'])->name('laporan.create');
Route::post('/siswa/laporan/store', [LaporanKegiatanController::class, 'store'])->name('laporan.store');
Route::get('/siswa/laporan', [LaporanKegiatanController::class, 'index'])->name('laporan.index');

// Rute halaman Laporan Siswa
Route::get('/siswa/laporan', function () {
    return view('siswa.laporanSiswa');
})->name('siswa.laporan');

// Rute halaman Konten Siswa
Route::get('/siswa/content', function () {
    return view('siswa.content');
})->name('siswa.content');

// Rute halaman Dashboard Admin
Route::get('/admin/content', function () {
    return view('admin.content');
})->name('admin.content');


// Rute untuk mengelola akun admin
Route::get('/admin/create', [AkunController::class, 'create'])->name('admin.create');
Route::get('/admin/list', [AkunController::class, 'index'])->name('admin.list');
Route::post('/akun/store', [AkunController::class, 'store'])->name('akun.store');

// Rute halaman Absensi dan Laporan Siswa Admin
Route::get('/admin/tabelAbsen', [AdminController::class, 'tabelAbsen'])->name('admin.dataAbsen');
Route::get('/admin/dataLaporan', [AdminController::class, 'laporanKegiatan'])->name('admin.dataLaporan');

// Rute halaman Dashboard Mitra
Route::get('/mitra/content', function () {
    return view('mitra.content');
})->name('mitra.content');

// Rute halaman Absensi dan Laporan Kegiatan Mitra
Route::get('/mitra/tabelAbsen', [MitraController::class, 'tabelAbsen'])->name('mitra.dataAbsen');
Route::get('/mitra/dataLaporan', [MitraController::class, 'laporanKegiatan'])->name('mitra.datalaporan');

// Rute halaman Dashboard dan Profil Guru
Route::get('/guru/content', function () {
    return view('guru.content');
})->name('guru.content');
Route::get('/guru/profil', function () {
    return view('guru.profil');
})->name('guru.profil');

// Rute halaman Absensi, Daftar Siswa, dan Laporan Guru
Route::get('/guru/tabelAbsen', [GuruController::class, 'tabelAbsen'])->name('guru.dataAbsen');
Route::get('/guru/datadaftarsiswa', [GuruController::class, 'dataDaftarSiswa'])->name('guru.datadaftarsiswa');
Route::get('/guru/dataLaporan', [GuruController::class, 'laporanKegiatan'])->name('guru.dataLaporan');

// Rute halaman utama dan login
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');

// Rute autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Rute dashboard berdasarkan role
Route::get('/admin/content', [AdminController::class, 'dashboard'])->name('admin.content');
Route::get('/guru/content', [GuruController::class, 'dashboard'])->name('guru.content');
Route::get('/mitra/content', [MitraController::class, 'dashboard'])->name('mitra.content');
Route::get('/siswa/content', [SiswaController::class, 'index'])->name('siswa.content');

// Rute diagram kehadiran
Route::get('/siswa/content', [SiswaController::class, 'content'])->name('siswa.content');
Route::get('/guru/content', [GuruController::class, 'content'])->name('guru.content');
Route::get('/mitra/content', [MitraController::class, 'content'])->name('mitra.content');
Route::get('/admin/content', [AdminController::class, 'content'])->name('admin.content');
Route::get('/kunjungan', [AuthController::class, 'kunjungan']);

// Rute untuk mengambil data login
Route::get('/get-login-data', [AuthController::class, 'getLoginData']);

// Rute untuk ACC laporan
Route::get('/siswa/content', [SiswaController::class, 'acclaporan'])->name('siswa.content');
Route::post('/laporan/acc', [LaporanKegiatanController::class, 'acc'])->name('laporan.acc');
Route::post('/guru/laporan/acc', [LaporanKegiatanController::class, 'acc'])->name('guru.laporan.acc');

// Rute untuk menampilkan profil siswa
Route::get('/siswa/profile', [SiswaController::class, 'profile'])->name('siswa.profile');

// Rute untuk halaman edit profil siswa
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');

// Rute untuk memperbarui profil siswa
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::put('/siswa/update-photo/{id}', [SiswaController::class, 'updatePhoto'])->name('siswa.updatePhoto');

// Rute dashboard siswa
Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');

Route::get('/laporan/edit/{id}', [LaporanKegiatanController::class, 'edit'])->name('laporan.edit');



// web.php
Route::middleware(['web'])->group(function () {
    Route::get('/guru/download-pdf', [GuruController::class, 'generatePdf'])->name('guru.downloadLaporanKegiatanPdf');
});

Route::middleware(['web'])->group(function () {
    Route::get('/guru/download-absen-pdf', [GuruController::class, 'generateAbsenPdf'])->name('guru.downloadDataAbsenPdf');
    Route::get('/guru/download-daftar-pdf', [GuruController::class, 'generateDaftarSiswaPdf'])->name('guru.downloadDaftarSiswaPdf');
});

// web.php
Route::middleware(['web'])->group(function () {
    Route::get('/guru/download-pdf', [AdminController::class, 'generatePdf'])->name('guru.downloadLaporanKegiatanPdf');
});

// web.php
Route::middleware(['web'])->group(function () {
    Route::get('/guru/download-absen-pdf', [MitraController::class, 'generateAbsenPdf'])->name('guru.downloadDataAbsenPdf');
    Route::get('/guru/download-pdf', [MitraController::class, 'generatePdf'])->name('guru.downloadLaporanKegiatanPdf');
});


// Menampilkan halaman form untuk menambah data tempat PKL
Route::get('/admin/tempat', [TempatPklController::class, 'create'])->name('admin.tempat');

// Menyimpan data tempat PKL yang dikirim melalui form
Route::post('/admin/store', [TempatPklController::class, 'store'])->name('admin.store');

// Menampilkan daftar tempat PKL yang ada dalam database
Route::get('/admin/datatempat', [TempatPklController::class, 'index'])->name('admin.datatempat');


// Rute untuk menampilkan profil siswa
Route::get('/mitra/profile', [MitraController::class, 'profile'])->name('mitra.profile');

// Rute untuk halaman edit profil siswa
Route::get('/mitra/edit/{id}', [MitraController::class, 'edit'])->name('mitra.edit');

// Rute untuk memperbarui profil siswa
Route::put('/mitra/{id}', [MitraController::class, 'update'])->name('mitra.update');
Route::put('/mitra/update-photo/{id}', [MitraController::class, 'updatePhoto'])->name('mitra.updatePhoto');

//Rute untuk menampilkan profil siswa
Route::get('/guru/profile', [GuruController::class, 'profile'])->name('guru.profile');

// Rute untuk halaman edit profil siswa
Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');

// Rute untuk memperbarui profil siswa
Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::put('/guru/update-photo/{id}', [GuruController::class, 'updatePhoto'])->name('guru.updatePhoto');



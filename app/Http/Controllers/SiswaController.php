<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\LaporanKegiatan;
use App\Models\User; // Pastikan model User di-import
use App\Models\Akun;
use Illuminate\Support\Facades\Auth; // Untuk menggunakan Auth
use Illuminate\Support\Facades\Storage; // Untuk mengelola penyimpanan file

class SiswaController extends Controller
{
    // Menampilkan halaman utama siswa
   public function index()
{
return view('siswa.content');
}

// Menampilkan konten siswa dengan data kehadiran
public function content()
{
$user = session('user_data'); // Ambil data user dari session

// Hitung jumlah kehadiran berdasarkan user_id dan status
$hadir = Attendance::where('user_id', $user->id)->where('status', 'Hadir')->count();
$sakit = Attendance::where('user_id', $user->id)->where('status', 'Sakit')->count();
$izin = Attendance::where('user_id', $user->id)->where('status', 'Izin')->count();
$alpa = Attendance::where('user_id', $user->id)->where('status', 'Alpa')->count();

// Format data kehadiran untuk dikirim ke view
$kehadiran = [
'Hadir' => $hadir,
'Sakit' => $sakit,
'Izin' => $izin,
'Alpa' => $alpa,
];

// Kirim data ke view siswa.content
return view('siswa.content', compact('kehadiran'));
}

public function acclaporan()
{
// Ambil data pengguna yang sedang login
$user = session('user_data'); // atau Auth::user() jika menggunakan autentikasi Laravel

// Ambil laporan yang sudah ACC dan yang statusnya pending dari laporan milik pengguna ini saja
$laporanAcc = LaporanKegiatan::where('acc', true)->where('user_id', $user->id)->get();
$laporanPending = LaporanKegiatan::where('status', 'pending')->where('user_id', $user->id)->get();

// Ambil data kehadiran pengguna
$hadir = Attendance::where('user_id', $user->id)->where('status', 'Hadir')->count();
$sakit = Attendance::where('user_id', $user->id)->where('status', 'Sakit')->count();
$izin = Attendance::where('user_id', $user->id)->where('status', 'Izin')->count();
$alpa = Attendance::where('user_id', $user->id)->where('status', 'Alpa')->count();

// Format data kehadiran
$kehadiran = [
'Hadir' => $hadir,
'Sakit' => $sakit,
'Izin' => $izin,
'Alpa' => $alpa,
];

// Kirimkan data ke view
return view('siswa.content', compact('laporanAcc', 'laporanPending', 'kehadiran'));
}

// Menampilkan halaman profil dengan data pengguna
public function profile()
{
$user = session('user_data');

// Jika tidak ada data pengguna di session, ambil dari database
if (!$user) {
$user = Auth::user(); // Ambil data dari database berdasarkan ID pengguna yang login
}

return view('siswa.profile', compact('user'));
}

// Menampilkan halaman edit profil
public function edit($id)
{
$user = Akun::find($id);

if (!$user) {
\Log::error('Pengguna dengan ID ' . $id . ' tidak ditemukan.');
return redirect()->route('siswa.profile')->with('error', 'Pengguna tidak ditemukan.');
}

return view('siswa.edit', compact('user'));
}

// Memperbarui data profil siswa
public function update(Request $request, $id)
{
// Validasi input
$validated = $request->validate([
'nama_lengkap' => 'required|string|max:255',
'email' => 'required|email|max:255',
'gender' => 'required|in:male,female',
'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
]);

$user = Akun::find($id);

if (!$user) {
return redirect()->route('siswa.index')->with('error', 'Pengguna tidak ditemukan.');
}

// Update data siswa
$user->nama_lengkap = $request->nama_lengkap;
$user->email = $request->email;
$user->gender = $request->gender;

// Tangani pembaruan foto profil
if ($request->hasFile('profile_picture')) {
// Hapus foto lama jika ada
if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
Storage::delete('public/' . $user->profile_picture);
}

// Simpan foto baru
$path = $request->file('profile_picture')->store('profile_pictures', 'public');
$user->profile_picture = $path;
}

$user->save();

return redirect()->route('siswa.profile')->with('success', 'Data siswa berhasil diperbarui.');
}

public function dashboard()
{
// Logika atau data yang ingin Anda kirim ke view
return view('siswa.dashboard');
// Pastikan view ini ada
}


// Memperbarui foto profil siswa
// Controller: SiswaController.php
public function updatePhoto(Request $request, $id)
{
$request->validate([
'profile_picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
]);

$user = Akun::find($id);

if (!$user) {
return redirect()->route('siswa.profil', $id)->with('error', 'Pengguna tidak ditemukan.');
}

// Hapus foto lama jika ada
if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
Storage::delete('public/' . $user->profile_picture);
}

// Simpan foto baru
$path = $request->file('profile_picture')->store('profile_pictures', 'public');
$user->profile_picture = $path;
$user->save();

return redirect()->route('siswa.profil', $id)->with('success', 'Foto berhasil diperbarui.');
}


}

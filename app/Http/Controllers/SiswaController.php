<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\LaporanKegiatan;
use App\Models\User; // Pastikan model User di-import
use App\Models\Akun;
use Illuminate\Support\Facades\Auth; // Tambahkan baris ini


class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.content');
    }

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
        // Dapatkan laporan yang sudah ACC dan Pending
        $laporanAcc = LaporanKegiatan::where('acc', true)->get();
        $laporanPending = LaporanKegiatan::where('status', 'pending')->get();

        // Ambil data kehadiran
        $user = session('user_data'); // Ambil data user dari session
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
    // Ambil data pengguna dari session
    $user = session('user_data');

    // Jika tidak ada data pengguna di session, ambil dari database (jika dibutuhkan)
    if (!$user) {
        $user = Auth::user(); // Atau mengambil data dari database berdasarkan id pengguna yang login
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
    // Temukan user berdasarkan ID
    $user = Akun::find($id);

    if (!$user) {
        return redirect()->route('siswa.profile')->with('error', 'Pengguna tidak ditemukan.');
    }

    // Validasi input
    $validated = $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:akun,email,' . $user->id,
        'gender' => 'required|in:Laki-laki,Perempuan',
    ]);

    // Update data secara manual
    $user->nama_lengkap = $validated['nama_lengkap'];
    $user->email = $validated['email'];
    $user->gender = $validated['gender'];
    $user->save(); // Simpan perubahan ke database

    // Redirect kembali ke profil dengan pesan sukses
    return redirect()->route('siswa.profile')->with('success', 'Profil berhasil diperbarui.');
}

public function dashboard()
{
    return view('siswa.dashboard');
}

}
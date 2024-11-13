<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Tambahkan ini untuk menggunakan DB

use App\Models\Attendance;
use App\Models\LaporanKegiatan;



 class AdminController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('user')->get(); // Ambil data kehadiran dengan relasi user
        return view('admin.dashboard', compact('attendances'));
    }

    public function laporan()
    {

        // Mengambil data laporan kegiatan beserta relasi user
        $laporanKegiatan = LaporanKegiatan::with('user')->get();

        // Mengirim data ke view
        return view('admin.dashboard', compact('laporanKegiatan'));
    }

public function daftar()
    {
        // Ambil semua data akun
        $accounts = Account::all();

        // Kirimkan data ke view
        return view('admin.dashboard', compact('accounts'));
    }

    public function dashboard()
{
    // Ambil data absensi siswa dengan relasi user
    $attendances = Attendance::with('user')->get(); // Pastikan relasi 'user' terdefinisi di model Attendance

    // Ambil data laporan kegiatan
    $laporanKegiatan = DB::table('laporan_kegiatan')->get(); // atau menggunakan model

    // Kirim kedua data ke view 'admin.dashboard'
    return view('admin.dashboard', compact('attendances', 'laporanKegiatan'));
}

}

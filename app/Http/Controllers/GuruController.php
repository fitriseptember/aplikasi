<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Attendance;
use App\Models\LaporanKegiatan;

class GuruController extends Controller
{
    // In GuruController

public function index()
{
    $attendances = Attendance::with('user')->get(); // Eager load the user with attendance records
    return view('guru.dashboard', compact('attendances'));
}

 public function laporan()
    {

        // Mengambil data laporan kegiatan beserta relasi user
        $laporanKegiatan = LaporanKegiatan::with('user')->get();

        // Mengirim data ke view
        return view('guru.dashboard', compact('laporanKegiatan'));
    }

 public function dashboard()
{
    // Ambil data absensi siswa dengan relasi user
    $attendances = Attendance::with('user')->get(); // Pastikan relasi 'user' terdefinisi di model Attendance

    // Ambil data laporan kegiatan
    $laporanKegiatan = DB::table('laporan_kegiatan')->get(); // atau menggunakan model

    // Kirim kedua data ke view 'admin.dashboard'
    return view('guru.dashboard', compact('attendances', 'laporanKegiatan'));
}

}

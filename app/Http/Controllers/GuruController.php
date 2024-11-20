<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Attendance;
use App\Models\Siswa;  // Mengimpor model Siswa
use App\Models\LaporanKegiatan; // Tambahkan ini untuk mengimport model


class GuruController extends Controller
{

    // Metode dashboard
    public function dashboard()
    {
        // Logika untuk mengambil data atau melakukan hal lain yang diperlukan
        return view('guru.dashboard'); // Ganti dengan view yang sesuai
    }

    public function tabelAbsen()
    {
        // Ambil data kehadiran dengan relasi user
        $attendances = Attendance::with('user')->get(); 
        return view('guru.dataAbsen', compact('attendances')); // Menampilkan data absen ke tampilan admin.dataAbsen
    }

     // Metode laporanKegiatan
    public function laporanKegiatan()
{
    $laporanKegiatan = LaporanKegiatan::with('user')->get(); // Ambil data dengan relasi ke user
    return view('guru.dataLaporan', compact('laporanKegiatan'));
}
}         
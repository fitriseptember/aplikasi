<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\LaporanKegiatan;

class DashboardController extends Controller
{
    // Menampilkan data absensi di dashboard
    public function index()
    {
        // Mengambil data absensi beserta data pengguna yang terkait
        $attendances = Attendance::with('user')->get();

        // Mengirimkan data absensi ke view dashboard
        return view('dashboard', compact('attendances'));
    }

    // Menampilkan data laporan kegiatan di dashboard
    public function laporan()
    {
        // Mengambil data laporan kegiatan beserta data pengguna yang terkait
        $laporanKegiatan = LaporanKegiatan::with('user')->get();

        // Mengirimkan data laporan kegiatan ke view dashboard
        return view('dashboard', compact('laporanKegiatan'));
    }
}

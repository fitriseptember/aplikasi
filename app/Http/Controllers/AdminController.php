<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\LaporanKegiatan; // Import model LaporanKegiatan jika belum
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Metode dashboard
    public function dashboard()
    {
        // Logika untuk dashboard
        return view('admin.dashboard');
    }

    // Metode tabelAbsen
    public function tabelAbsen()
    {
        $attendances = Attendance::with('user')->get();
        return view('admin.dataAbsen', compact('attendances'));
    }

    // Metode laporanKegiatan
    public function laporanKegiatan()
{
    $laporanKegiatan = LaporanKegiatan::with('user')->get(); // Ambil data dengan relasi ke user
    return view('admin.dataLaporan', compact('laporanKegiatan'));
}

}

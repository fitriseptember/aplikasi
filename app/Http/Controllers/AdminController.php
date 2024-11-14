<?php

// App\Http\Controllers\AdminController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use App\Models\LaporanKegiatan;
use App\Models\Akun; // Pastikan model Akun sudah ada dan bisa diakses

class AdminController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('user')->get(); // Ambil data kehadiran dengan relasi user
        return view('admin.dashboard', compact('attendances'));
    }

    public function laporan()
    {
        $laporanKegiatan = LaporanKegiatan::with('user')->get(); // Ambil data laporan dengan relasi user
        return view('admin.dashboard', compact('laporanKegiatan'));
    }

    public function daftar()
    {
        $accounts = Akun::all(); // Pastikan menggunakan model Akun, bukan Account
        return view('admin.dashboard', compact('accounts'));
    }

    public function dashboard()
    {
        $attendances = Attendance::with('user')->get(); // Data kehadiran dengan relasi user
        $laporanKegiatan = LaporanKegiatan::with('user')->get(); // Data laporan kegiatan

        return view('admin.dashboard', compact('attendances', 'laporanKegiatan'));
    }
}

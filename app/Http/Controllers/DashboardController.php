<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\LaporanKegiatan;

class DashboardController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('user')->get();
    return view('dashboard', compact('attendances'));
    }

    public function laporan()
{
    $laporanKegiatan = LaporanKegiatan::with('user')->get();
    return view('dashboard', compact('laporanKegiatan'));
}

}

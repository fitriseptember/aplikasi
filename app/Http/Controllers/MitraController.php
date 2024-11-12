<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\LaporanKegiatan;

class MitraController extends Controller
{
    // In AdminController

public function index()
{
    $attendances = Attendance::with('user')->get(); // Eager load the user with attendance records
    return view('mitra.dashboard', compact('attendances'));
}

public function laporan()
{
    $laporanKegiatan = LaporanKegiatan::with('user')->get();
    return view('mitra.dashboard', compact('laporanKegiatan'));
}

}
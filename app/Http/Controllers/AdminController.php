<?php

namespace App\Http\Controllers;

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
        $laporanKegiatan = LaporanKegiatan::with('user')->get();
        return view('admin.dashboard', compact('laporanKegiatan'));
        }

public function daftar()
    {
        // Ambil semua data akun
        $accounts = Account::all();

        // Kirimkan data ke view
        return view('admin.dashboard', compact('accounts'));
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    // Menampilkan form absensi
    public function create()
    {
        return view('siswa.dashboard');
    }

   public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'status' => 'required|string',
    ]);

    Attendance::create([
        'tanggal' => $request->tanggal,
        'status' => $request->status,
        'user_id' => session('user_data')->id,  // Jika menggunakan auth untuk user_id
    ]);
}
}

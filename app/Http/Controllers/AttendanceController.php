<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    // Menampilkan form absensi
    public function create()
    {
        return view('siswa.absenSiswa');
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

     // Redirect ke dashboard siswa dengan notifikasi sukses
        return redirect()->route('siswa.dashboard')->with('success', 'Absensi berhasil dikirim.');
    }

    public function index()
{
    // Ambil data absensi
    $attendances = Attendance::where('user_id', session('user_data')->id)->get();

    // Tampilkan dashboard dengan data absensi
    return view('siswa.absenSiswa', compact('attendances'));


    }

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' adalah foreign key di tabel kehadiran
    }

}
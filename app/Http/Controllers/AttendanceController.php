<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    // Menampilkan form absensi
    public function create()
    {
        return view('siswa.absenSiswa');
    }

    // Menyimpan data absensi
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
            'tempat_pkl' => 'required|string', // Validate tempat_pkl
        ]);

        $tanggalAbsen = now()->toDateString(); // Tanggal hari ini
        $jamAbsen = now()->toTimeString(); // Jam saat ini (format HH:mm:ss)

        // Menyimpan data absensi ke database
        Attendance::create([
            'tanggal' => $tanggalAbsen,
            'time' => $jamAbsen, // Waktu absensi
            'status' => $request->status,
            'tempat_pkl' => $request->tempat_pkl, // Menyimpan nama tempat PKL
            'user_id' => session('user_data')->id, // ID user dari session
        ]);

        return redirect()->route('siswa.content')->with('success', 'Absensi berhasil dikirim.');
    }

    // Menampilkan data absensi
    public function index()
    {
        $userId = auth()->id();
        $tanggalHariIni = now()->toDateString();

        // Periksa apakah absensi sudah dilakukan hari ini
        $absensi = DB::table('kehadiran')
            ->where('user_id', $userId)
            ->where('tanggal', $tanggalHariIni)
            ->first();

        return view('siswa.absenSiswa', [
            'absensiSudahDiisi' => $absensi !== null,
            'statusAbsensi' => $absensi->status ?? null,
            'tempatPkl' => $absensi->tempat_pkl ?? null, // Pass the tempat_pkl value to the view
        ]);
    }

    // Mendapatkan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

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
        // Menampilkan view untuk form absensi siswa
        return view('siswa.absenSiswa');
    }

    // Menyimpan data absensi ke database
    public function store(Request $request)
    {
        // Validasi input data dari form absensi
        $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required|string',
        ]);

        // Simpan data absensi ke tabel 'attendance'
        Attendance::create([
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'user_id' => session('user_data')->id, // Menggunakan ID user dari session
        ]);

        // Redirect ke dashboard siswa dengan notifikasi sukses
        return redirect()->route('siswa.content')->with('success', 'Absensi berhasil dikirim.');
    }

    // Menampilkan data absensi
    public function index()
    {
        // Mengambil ID pengguna yang sedang login
        $userId = auth()->id();
        $tanggalHariIni = date('Y-m-d'); // Tanggal hari ini

        // Memeriksa apakah absensi sudah diisi untuk hari ini
        $absensi = DB::table('kehadiran')
            ->where('user_id', $userId)
            ->where('tanggal', $tanggalHariIni)
            ->first();

        // Cek apakah absensi sudah diisi
        $absensiSudahDiisi = $absensi !== null;

        // Menampilkan view form absensi dengan data status absensi
        return view('siswa.absenSiswa', [
            'absensiSudahDiisi' => $absensiSudahDiisi,
            'statusAbsensi' => $absensi->status ?? null, // Mengirimkan status absensi jika sudah diisi
        ]);
    }

    // Mendapatkan relasi dengan model User
    public function user()
    {
        // Relasi dengan model User, menggunakan 'user_id' sebagai foreign key di tabel kehadiran
        return $this->belongsTo(User::class, 'user_id');
    }
}

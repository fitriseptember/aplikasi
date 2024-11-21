<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Attendance;
use App\Models\Siswa;  // Mengimpor model Siswa
use App\Models\LaporanKegiatan; // Tambahkan ini untuk mengimport model
use App\Models\Akun;


class GuruController extends Controller
{

    // Metode dashboard
    public function dashboard()
    {
        // Logika untuk mengambil data atau melakukan hal lain yang diperlukan
        return view('guru.dashboard'); // Ganti dengan view yang sesuai
    }

    public function tabelAbsen()
    {
        // Ambil data kehadiran dengan relasi user
        $attendances = Attendance::with('user')->get(); 
        return view('guru.dataAbsen', compact('attendances')); // Menampilkan data absen ke tampilan admin.dataAbsen
    }

     // Metode laporanKegiatan
    public function laporanKegiatan()
{
    $laporanKegiatan = LaporanKegiatan::with('user')->get(); // Ambil data dengan relasi ke user
    return view('guru.dataLaporan', compact('laporanKegiatan'));
}

 public function dataDaftarSiswa()
    {
        // Ambil data dari tabel akun
        $accounts = Akun::where('role', 'siswa')->get(); // Misal hanya menampilkan siswa
        return view('guru.datadaftarsiswa', compact('accounts'));
    }
     public function content()
{
    // Ambil data kehadiran berdasarkan status untuk semua siswa
    $hadir = Attendance::where('status', 'Hadir')->count();
    $sakit = Attendance::where('status', 'Sakit')->count();
    $izin = Attendance::where('status', 'Izin')->count();
    $alpa = Attendance::where('status', 'Alpa')->count();

    // Format data kehadiran untuk dikirim ke view
    $kehadiran = [
        'Hadir' => $hadir,
        'Sakit' => $sakit,
        'Izin' => $izin,
        'Alpa' => $alpa,
    ];

    // Ambil data login untuk semua user
    // Group by the date and count total logins per day
    $data = DB::table('login_logs')
        ->select(DB::raw('DATE(login_time) as date'), DB::raw('COUNT(*) as count'))
        ->groupBy(DB::raw('DATE(login_time)'))
        ->orderBy('date', 'asc')
        ->get();

    // Kirim data ke view siswa.content
    return view('guru.content', compact('kehadiran', 'data'));
}
}         
<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\LaporanKegiatan; // Import model LaporanKegiatan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade

class AdminController extends Controller
{
    // Metode untuk halaman dashboard admin
    public function dashboard()
    {
        // Logika untuk menampilkan halaman dashboard admin
        return view('admin.content');
    }

    // Metode untuk menampilkan tabel absensi
    public function tabelAbsen()
    {
        // Mengambil data absensi beserta relasi ke tabel user
        $attendances = Attendance::with('user')->get();
        // Mengirim data absensi ke tampilan admin.dataAbsen
        return view('admin.dataAbsen', compact('attendances'));
    }

    // Metode untuk menampilkan laporan kegiatan (PKL)
    public function laporanKegiatan()
    {
        // Mengambil data laporan kegiatan beserta relasi ke tabel user
        $laporanKegiatan = LaporanKegiatan::with('user')->get();
        // Mengirim data laporan kegiatan ke tampilan admin.dataLaporan
        return view('admin.dataLaporan', compact('laporanKegiatan'));
    }

    // Metode untuk menampilkan data konten kehadiran dan data login
    public function content()
    {
        // Menghitung data kehadiran berdasarkan status absensi untuk semua siswa
        $hadir = Attendance::where('status', 'Hadir')->count();
        $sakit = Attendance::where('status', 'Sakit')->count();
        $izin = Attendance::where('status', 'Izin')->count();
        $alpa = Attendance::where('status', 'Alpa')->count();

        // Membuat array data kehadiran untuk dikirim ke view
        $kehadiran = [
            'Hadir' => $hadir,
            'Sakit' => $sakit,
            'Izin' => $izin,
            'Alpa' => $alpa,
        ];

        // Mengambil data login untuk semua user
        // Dikelompokkan berdasarkan tanggal dan menghitung total login per hari
        $data = DB::table('login_logs')
            ->select(DB::raw('DATE(login_time) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE(login_time)'))
            ->orderBy('date', 'asc')
            ->get();

        // Mengirim data kehadiran dan data login ke tampilan admin.content
        return view('admin.content', compact('kehadiran', 'data'));
    }
}

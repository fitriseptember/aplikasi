<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use App\Models\Siswa;  // Mengimpor model Siswa
use App\Models\LaporanKegiatan; // Mengimpor model LaporanKegiatan
use App\Models\Akun; // Mengimpor model Akun

class GuruController extends Controller
{
    // Metode dashboard untuk menampilkan halaman utama dashboard
    public function dashboard()
    {
        return view('guru.content'); // Ganti dengan view yang sesuai
    }

    // Menampilkan tabel absensi
    public function tabelAbsen()
    {
        // Ambil data kehadiran dengan relasi ke model User
        $attendances = Attendance::with('user')->get();

        // Menampilkan data absensi ke tampilan guru.dataAbsen
        return view('guru.dataAbsen', compact('attendances'));
    }

    // Menampilkan laporan kegiatan
    public function laporanKegiatan()
    {
        // Ambil data laporan kegiatan dengan relasi ke user
        $laporanKegiatan = LaporanKegiatan::with('user')->get();

        // Menampilkan data laporan kegiatan ke tampilan guru.dataLaporan
        return view('guru.dataLaporan', compact('laporanKegiatan'));
    }

    // Menampilkan daftar siswa
    public function dataDaftarSiswa()
    {
        // Ambil data akun dengan role 'siswa'
        $accounts = Akun::where('role', 'siswa')->get();

        // Menampilkan data daftar siswa ke tampilan guru.datadaftarsiswa
        return view('guru.datadaftarsiswa', compact('accounts'));
    }

    // Menampilkan konten dashboard dengan data kehadiran dan login
    public function content()
    {
        // Menghitung jumlah kehadiran berdasarkan status
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

        // Mengambil data login yang dikelompokkan berdasarkan tanggal dan menghitung total login per hari
        $data = DB::table('login_logs')
            ->select(DB::raw('DATE(login_time) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE(login_time)'))
            ->orderBy('date', 'asc')
            ->get();

        // Kirim data ke view guru.content
        return view('guru.content', compact('kehadiran', 'data'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\LaporanKegiatan; // Import model LaporanKegiatan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use Barryvdh\DomPDF\Facade\PDF;

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

    // Metode untuk download laporan kegiatan sebagai PDF
     public function generatePdf()
    {
        $laporanKegiatan = LaporanKegiatan::with('user')->get();

        $data = [
            'title' => 'Laporan Kegiatan Siswa',
            'date' => date('d-m-Y'),
            'laporanKegiatan' => $laporanKegiatan,
        ];

        $pdf = PDF::loadView('admin.pdfLaporan', $data);

        // Unduh file PDF dengan nama laporan_kegiatan.pdf
        return $pdf->download('laporan_kegiatan.pdf');
    }


    public function generateAkunPdf()
{
     $accounts = DB::table('akun')->get();

    // Membuat PDF dari view 'admin.pdfAkun' dengan data akun
    $pdf = PDF::loadView('admin.pdfAkun', compact('accounts'))->setPaper('a4', 'portrait');

    // Mengunduh PDF dengan nama "data_akun.pdf"
    return $pdf->download('daftar_akun.pdf');
}


public function generateTempatPklPdf()
    {
        // Ambil data dari tabel tempat PKL
        $tempatPkl = DB::table('tempat_pkl')->get();

        // Buat PDF berdasarkan view 'admin.pdfTempat'
        $pdf = PDF::loadView('admin.pdfTempat', compact('tempatPkl'))->setPaper('a4', 'landscape');

        // Unduh PDF dengan nama "data_tempat_pkl.pdf"
        return $pdf->download('data_tempat_pkl.pdf');
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

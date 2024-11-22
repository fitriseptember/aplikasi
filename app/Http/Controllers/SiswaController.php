<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\LaporanKegiatan;
use App\Models\User; // Pastikan model User di-import

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.content');
    }

    public function content()
    {
        $user = session('user_data'); // Ambil data user dari session

        // Hitung jumlah kehadiran berdasarkan user_id dan status
        $hadir = Attendance::where('user_id', $user->id)->where('status', 'Hadir')->count();
        $sakit = Attendance::where('user_id', $user->id)->where('status', 'Sakit')->count();
        $izin = Attendance::where('user_id', $user->id)->where('status', 'Izin')->count();
        $alpa = Attendance::where('user_id', $user->id)->where('status', 'Alpa')->count();

        // Format data kehadiran untuk dikirim ke view
        $kehadiran = [
            'Hadir' => $hadir,
            'Sakit' => $sakit,
            'Izin' => $izin,
            'Alpa' => $alpa,
        ];

        // Kirim data ke view siswa.content
        return view('siswa.content', compact('kehadiran'));
    }

   
    public function acclaporan()
    {
        // Dapatkan laporan yang sudah ACC dan Pending
        $laporanAcc = LaporanKegiatan::where('acc', true)->get();
        $laporanPending = LaporanKegiatan::where('status', 'pending')->get();

        // Ambil data kehadiran
        $user = session('user_data'); // Ambil data user dari session
        $hadir = Attendance::where('user_id', $user->id)->where('status', 'Hadir')->count();
        $sakit = Attendance::where('user_id', $user->id)->where('status', 'Sakit')->count();
        $izin = Attendance::where('user_id', $user->id)->where('status', 'Izin')->count();
        $alpa = Attendance::where('user_id', $user->id)->where('status', 'Alpa')->count();

        // Format data kehadiran
        $kehadiran = [
            'Hadir' => $hadir,
            'Sakit' => $sakit,
            'Izin' => $izin,
            'Alpa' => $alpa,
        ];

        // Kirimkan data ke view
        return view('siswa.content', compact('laporanAcc', 'laporanPending', 'kehadiran'));
    }
}

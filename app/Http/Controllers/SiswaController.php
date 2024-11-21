<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;


class SiswaController extends Controller
{
     public function index()
    {
        return view('siswa.dashboard'); // Pastikan view ini ada di resources/views/admin/dashboard.blade.php
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
}


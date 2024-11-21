<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\LaporanKegiatan; // Import model LaporanKegiatan jika belum
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this line to import the DB facade

class AdminController extends Controller
{
    // Metode dashboard
    public function dashboard()
    {
        // Logika untuk dashboard
        return view('admin.dashboard');
    }

    // Metode tabelAbsen
    public function tabelAbsen()
    {
        $attendances = Attendance::with('user')->get();
        return view('admin.dataAbsen', compact('attendances'));
    }

    // Metode laporanKegiatan
    public function laporanKegiatan()
    {
        $laporanKegiatan = LaporanKegiatan::with('user')->get(); // Ambil data dengan relasi ke user
        return view('admin.dataLaporan', compact('laporanKegiatan'));
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
    return view('admin.content', compact('kehadiran', 'data'));
}

public function search(Request $request)
{
    $query = $request->input('query'); // Ambil teks pencarian
    $results = User::where('name', 'LIKE', "%{$query}%") // Cari berdasarkan nama
                   ->orWhere('email', 'LIKE', "%{$query}%")
                   ->get();

    return response()->json($results); // Kembalikan data dalam format JSON
}


}

<?php
namespace App\Http\Controllers;

use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data absensi untuk guru/admin/mitra
        $absensis = Absensi::with('user')->get();  // Ambil data absensi beserta relasi user

        return view('dashboard', compact('absensis'));  // Mengirimkan variabel 'absensis' ke view
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanKegiatan;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class LaporanKegiatanController extends Controller
{
    // Display the form for activity report submission
    public function create()
    {
        return view('siswa.dashboard');
    }

    // Store a new activity report in the database
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'foto_kegiatan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the activity photo and get its storage path
        $path = $request->file('foto_kegiatan')->store('foto_kegiatan', 'public');

        // Save the activity report data
        LaporanKegiatan::create([
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'foto_kegiatan' => $path,
            'user_id' => session('user_data')->id,
        ]);

        // Redirect back to the dashboard with a success message
        return redirect()->route('siswa.dashboard')->with('success', 'Laporan kegiatan berhasil dikirim.');
    }

    // Display activity reports for the logged-in student
    public function index()
    {
        // Retrieve activity reports for the logged-in student
        $laporan = LaporanKegiatan::where('user_id', session('user_data')->id)->get();

        // Display the dashboard with the activity report data
        return view('siswa.dashboard', compact('laporan'));
    }
}
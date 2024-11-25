<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Untuk menggunakan DB

use Illuminate\Http\Request;
use App\Models\LaporanKegiatan;
use App\Models\User;

class LaporanKegiatanController extends Controller
{
    // Menampilkan form untuk pengiriman laporan kegiatan
    public function create()
    {
        return view('siswa.content'); // Pastikan view sesuai
    }

    // Menyimpan laporan kegiatan baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'foto_kegiatan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan foto kegiatan dan ambil path penyimpanannya
        $path = $request->file('foto_kegiatan')->store('foto_kegiatan', 'public');

        // Simpan data laporan kegiatan
        LaporanKegiatan::create([
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'foto_kegiatan' => $path,
            'user_id' => session('user_data')->id,
        ]);

        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('siswa.content')->with('success', 'Laporan kegiatan berhasil dikirim.');
    }

    // Menampilkan laporan kegiatan untuk siswa yang sedang login
    public function index()
    {
        // Ambil laporan kegiatan untuk siswa yang sedang login
        $laporan = LaporanKegiatan::where('user_id', session('user_data')->id)->get();

        // Tampilkan dashboard dengan data laporan kegiatan
        return view('siswa.dashboard', compact('laporan'));
    }

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' adalah foreign key di tabel laporan_kegiatan
    }

    // Metode untuk ACC laporan kegiatan
    public function acc(Request $request)
    {
        $id = $request->input('id'); // Ambil ID dari query string atau form
        $laporan = LaporanKegiatan::findOrFail($id);

        $laporan->acc = true; // Update status ACC menjadi true
        $laporan->save();

        return redirect()->back()->with('success', 'Status ACC berhasil diperbarui.');
    }
}

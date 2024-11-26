<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Untuk menggunakan DB

use Illuminate\Http\Request;
use App\Models\LaporanKegiatan;
use App\Models\User;
use Carbon\Carbon;

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

    $tanggalLaporan = now()->toDateString(); // Mendapatkan tanggal hari ini
    $jamLaporan = now()->toTimeString(); // Mendapatkan waktu sekarang dalam format HH:mm:ss

    // Simpan foto kegiatan dan ambil path penyimpanannya
    $path = $request->file('foto_kegiatan')->store('foto_kegiatan', 'public');

    // Simpan data laporan kegiatan ke database
    LaporanKegiatan::create([
        'tanggal' => $tanggalLaporan, // Tanggal laporan otomatis
        'time' => $jamLaporan, // Waktu laporan otomatis
        'deskripsi' => $request->deskripsi,
        'foto_kegiatan' => $path,
        'user_id' => session('user_data')->id, // Mengambil ID pengguna dari session
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

    public function acc(Request $request)
    {
        $id = $request->input('id'); // Ambil ID dari form
        $user = session('user_data'); // atau Auth::user() untuk pengguna yang sedang login

        // Cari laporan berdasarkan ID dan pastikan milik pengguna yang login
        $laporan = LaporanKegiatan::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        // Update status ACC menjadi true
        $laporan->acc = true;
        $laporan->save();

        return redirect()->back()->with('success', 'Status ACC laporan berhasil diperbarui.');
    }


}

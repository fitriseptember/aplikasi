<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TempatPklController extends Controller
{
    // Menampilkan form untuk menambah data Tempat PKL
    public function create()
    {
        // Mengambil data guru, siswa, dan mentor dari tabel akun
        $teachers = DB::table('akun')->where('role', 'guru')->pluck('nama_lengkap', 'id');
        $students = DB::table('akun')->where('role', 'siswa')->pluck('nama_lengkap', 'id');
        $mentors = DB::table('akun')->where('role', 'mentor')->pluck('nama_lengkap', 'id');

        // Menampilkan form input Tempat PKL
        return view('admin.tempat', compact('teachers', 'students', 'mentors'));
    }

    // Menampilkan daftar Tempat PKL
    public function index()
    {
        // Mengambil data Tempat PKL dari tabel tempat_pkl
        $tempatPkl = DB::table('tempat_pkl')->get();

        // Menampilkan daftar Tempat PKL
        return view('admin.datatempat', compact('tempatPkl'));
    }

    // Menyimpan data Tempat PKL
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'pkl_place' => 'required|string|max:255',
            'pkl_address' => 'required|string|max:255',
            'pkl_teacher' => 'required|exists:akun,id',
            'pkl_mentor' => 'required|exists:akun,id',
            'pkl_student' => 'required|exists:akun,id',
        ]);

        // Simpan data Tempat PKL ke tabel tempat_pkl
        DB::table('tempat_pkl')->insert([
            'pkl_place'   => $validatedData['pkl_place'],
            'pkl_address' => $validatedData['pkl_address'],
            'pkl_teacher' => DB::table('akun')->where('id', $validatedData['pkl_teacher'])->value('nama_lengkap'),
            'pkl_mentor'  => DB::table('akun')->where('id', $validatedData['pkl_mentor'])->value('nama_lengkap'),
            'pkl_student' => DB::table('akun')->where('id', $validatedData['pkl_student'])->value('nama_lengkap'),
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        // Redirect ke daftar Tempat PKL dengan pesan sukses
        return redirect()->route('admin.datatempat')->with('success', 'Data Tempat PKL berhasil disimpan!');
    }
}
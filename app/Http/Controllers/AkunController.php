<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    // Menampilkan form untuk menambah akun baru
    public function create()
    {
        // Menampilkan view untuk form pembuatan akun
        // Ganti dengan nama view yang sesuai jika diperlukan
        return view('admin.create');
    }

    // Menampilkan daftar akun yang ada
    public function index()
    {
        // Mengambil semua data dari tabel 'akun'
        $accounts = DB::table('akun')->get();

        // Mengirim data akun ke view 'admin.list'
        return view('admin.list', compact('accounts'));
    }

    // Menyimpan akun baru ke database
    public function store(Request $request)
    {
        // Validasi input data dari form
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:akun',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:akun',
            'role' => 'required',
            'gender' => 'required',
        ]);

        // Simpan data akun ke tabel 'akun'
        DB::table('akun')->insert([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash password untuk keamanan
            'email' => $request->email,
            'role' => $request->role,
            'gender' => $request->gender,
            'created_at' => now(), // Waktu saat data dibuat
            'updated_at' => now(), // Waktu saat data diperbarui
        ]);

        // Redirect ke halaman daftar akun dengan pesan sukses
        return redirect()->route('admin.list')->with('success', 'Akun berhasil ditambahkan!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    // Menampilkan form untuk menambah akun
    public function create()
    {
        return view('admin.create'); // Pastikan view ini ada
    }

    // Menampilkan daftar akun
    public function index()
    {
        // Mengambil semua data dari tabel 'akun'
        $accounts = DB::table('akun')->get();
        return view('admin.list', compact('accounts')); // Pastikan ini sesuai dengan nama view
    }

    // Menyimpan akun baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'role' => 'required',
            'gender' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:akun',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:akun',
        ]);

        // Simpan data ke tabel 'akun'
        DB::table('akun')->insert([
            'role' => $request->role,
            'gender' => $request->gender,
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Enkripsi password
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke daftar akun dengan pesan sukses
        return redirect()->route('admin.list')->with('success', 'Akun berhasil ditambahkan!');
    }
}

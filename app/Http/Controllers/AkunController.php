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
    // Validasi input dengan urutan yang diinginkan
    $request->validate([
        'nama_lengkap' => 'required|string|max:255', // Pertama
        'username' => 'required|string|max:255|unique:akun', // Kedua
        'password' => 'required|string|min:6', // Ketiga
        'email' => 'required|email|unique:akun', // Keempat
        'role' => 'required', // Kelima
        'gender' => 'required', // Keenam
    ]);

    // Simpan data ke tabel 'akun' dengan urutan yang diinginkan
    DB::table('akun')->insert([
        'nama_lengkap' => $request->nama_lengkap, // Pertama
        'username' => $request->username,         // Kedua
        'password' => Hash::make($request->password), // Ketiga (enkripsi password)
        'email' => $request->email,                // Keempat
        'role' => $request->role,                  // Kelima
        'gender' => $request->gender,              // Keenam
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Redirect ke daftar akun dengan pesan sukses
    return redirect()->route('admin.list')->with('success', 'Akun berhasil ditambahkan!');
}
}

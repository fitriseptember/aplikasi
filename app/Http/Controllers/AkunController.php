<?php

namespace App\Http\Controllers; // Namespace yang digunakan untuk mengelompokkan controller

use Illuminate\Http\Request; // Mengimpor kelas Request untuk menangani input HTTP
use Illuminate\Support\Facades\DB; // Mengimpor fasad DB untuk operasi database
use Illuminate\Support\Facades\Hash; // Mengimpor fasad Hash untuk hashing password

class AkunController extends Controller
{
    // Method untuk menampilkan form penambahan akun
    public function create()
    {
        return view('admin.create'); // Menampilkan view form penambahan akun. Ganti dengan path view sesuai kebutuhan.
    }

    // Method untuk menampilkan daftar akun
    public function index()
    {
        // Mengambil semua data dari tabel 'akun' menggunakan query builder
        $accounts = DB::table('akun')->get();

        // Menampilkan view 'admin.list' dan mengirimkan data 'accounts' ke view tersebut
        return view('admin.list', compact('accounts'));
    }

    // Method untuk menyimpan akun baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_lengkap' => 'required|string|max:255', // Nama lengkap harus diisi, berupa string, dan maksimal 255 karakter
            'username' => 'required|string|max:255|unique:akun', // Username harus unik dalam tabel 'akun'
            'password' => 'required|string|min:6', // Password harus diisi, berupa string, minimal 6 karakter
            'email' => 'required|email|unique:akun', // Email harus valid dan unik
            'role' => 'required', // Role harus diisi
            'gender' => 'required', // Gender harus diisi
        ]);

        // Memasukkan data yang divalidasi ke tabel 'akun'
        DB::table('akun')->insert([
            'nama_lengkap' => $request->nama_lengkap, // Mengambil input 'nama_lengkap' dari form
            'username' => $request->username, // Mengambil input 'username' dari form
            'password' => Hash::make($request->password), // Meng-hash password sebelum menyimpan
            'email' => $request->email, // Mengambil input 'email' dari form
            'role' => $request->role, // Mengambil input 'role' dari form
            'gender' => $request->gender, // Mengambil input 'gender' dari form
            'created_at' => now(), // Menyimpan waktu saat ini untuk kolom 'created_at'
            'updated_at' => now(), // Menyimpan waktu saat ini untuk kolom 'updated_at'
        ]);

        // Redirect ke halaman daftar akun dengan pesan sukses
        return redirect()->route('admin.list')->with('success', 'Akun berhasil ditambahkan!');
    }
}

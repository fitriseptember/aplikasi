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
        return view('admin.dashboard'); // Ganti dengan view yang sesuai jika ini bukan untuk dashboard
    }

    // Menampilkan daftar akun
   public function index()
{
    $accounts = DB::table('akun')->get();
    return view('admin.dashboard', compact('accounts'));
}


    // Menyimpan akun baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:akun',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:akun',
            'role' => 'required',
            'gender' => 'required',
        ]);

        // Simpan data ke tabel 'akun'
        DB::table('akun')->insert([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role' => $request->role,
            'gender' => $request->gender,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke daftar akun dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Akun berhasil ditambahkan!');
    }
}

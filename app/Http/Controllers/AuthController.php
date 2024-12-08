<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Menghandle request HTTP
use Illuminate\Support\Facades\DB; // Berinteraksi dengan database menggunakan query builder
use Illuminate\Support\Facades\Hash; // Menggunakan hashing untuk password
use Illuminate\Support\Facades\Log; // Untuk mencatat log sistem
use Illuminate\Support\Facades\Auth; // Menyediakan fungsi autentikasi
use Carbon\Carbon; // Library untuk manipulasi waktu dan tanggal

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        // Pastikan view 'login' tersedia di folder resources/views
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'username' => 'required', // Username wajib diisi
            'password' => 'required', // Password wajib diisi
        ]);

        // Ambil user dari database berdasarkan username
        $user = DB::table('akun')->where('username', $request->username)->first();

        // Log informasi saat ada percobaan login
        Log::info('Percobaan login dengan data:', ['username' => $request->username]);

        // Jika username tidak ditemukan
        if (!$user) {
            Log::info('Percobaan login gagal: Username tidak ditemukan.');
            return back()->withErrors(['login_error' => 'Username salah.']); // Kembali dengan error
        }

        // Periksa apakah password cocok
        if (!Hash::check($request->password, $user->password)) {
            Log::info('Percobaan login gagal: Password salah.');
            return back()->withErrors(['login_error' => 'Password salah.']); // Kembali dengan error
        }

        // Jika autentikasi berhasil, login user
        Auth::loginUsingId($user->id); // Login menggunakan ID user
        session(['user_data' => $user]); // Simpan data user di session
        Log::info('Autentikasi berhasil untuk user: ' . $user->username);

        // Simpan waktu login ke tabel 'login_logs'
        DB::table('login_logs')->insert([
            'username' => $request->username, // Nama pengguna yang login
            'login_time' => Carbon::now(), // Waktu login sekarang
        ]);

        // Redirect user berdasarkan peran
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.content'); // Admin diarahkan ke halaman admin
            case 'guru':
                return redirect()->route('guru.content'); // Guru diarahkan ke halaman guru
            case 'mentor':
                return redirect()->route('mitra.content'); // Mitra diarahkan ke halaman mitra
            case 'siswa':
                return redirect()->route('siswa.content'); // Siswa diarahkan ke halaman siswa
            default:
                // Redirect default jika peran tidak dikenali
                return redirect('/')->withErrors(['login_error' => 'Peran pengguna tidak dikenali.']);
        }
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
        $request->session()->invalidate(); // Hapus semua data session
        $request->session()->regenerateToken(); // Regenerasi token CSRF untuk keamanan
        return redirect()->route('login'); // Kembali ke halaman login
    }

    // Mendapatkan data login berdasarkan username di session
    public function getLoginData()
    {
        // Ambil username dari session
        $username = session('user_data')->username ?? null;

        // Cek apakah username ada di session
        if (!$username) {
            // Kembalikan respons error jika username tidak ditemukan di session
            return response()->json(['error' => 'User tidak login atau session tidak valid'], 401);
        }

        // Query data login berdasarkan username
        $data = DB::table('login_logs')
            ->select(DB::raw('DATE(login_time) as date'), DB::raw('COUNT(*) as count'))
            ->where('username', $username)
            ->groupBy(DB::raw('DATE(login_time)'))
            ->orderBy('date', 'asc')
            ->get();

        return response()->json($data); // Mengembalikan data dalam format JSON
    }

    // Mendapatkan data kunjungan login untuk semua user
    public function kunjungan()
    {
        // Mengambil data login dengan grup berdasarkan tanggal dan username
        $data = DB::table('login_logs')
            ->select(
                DB::raw('DATE(login_time) as date'), // Ambil tanggal login
                DB::raw('COUNT(*) as count'), // Jumlah login
                'username' // Username user
            )
            ->groupBy('username', DB::raw('DATE(login_time)')) // Grup berdasarkan tanggal dan username
            ->orderBy('date', 'asc') // Urutkan berdasarkan tanggal
            ->get();

        return response()->json($data); // Kembalikan data dalam format JSON
    }
}

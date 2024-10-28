<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLoginForm()
    {
        return view('login'); // Pastikan view 'login' ini ada
    }

    /**
     * Menangani proses login
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Mengambil data pengguna dari database berdasarkan username
        $user = DB::table('akun')->where('username', $request->username)->first();

        // Log untuk pengecekan apakah user ditemukan
        Log::info('Login attempt with data:', ['username' => $request->username]);

        // Cek apakah username ada di database
        if (!$user) {
            // Jika username salah
            Log::info('Failed login attempt: Username not found.');
            return back()->withErrors(['login_error' => 'Username salah.']);
        }

        // Cek apakah password cocok dengan user yang ditemukan
        if (!Hash::check($request->password, $user->password)) {
            // Jika password salah
            Log::info('Failed login attempt: Incorrect password.');
            return back()->withErrors(['login_error' => 'Password salah.']);
        }

        // Jika username dan password benar, log keberhasilan
        Log::info('Authentication successful for user: ' . $user->username);

        // Arahkan pengguna sesuai rolenya
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'guru':
                return redirect()->route('guru.dashboard');
            case 'mitra':
                return redirect()->route('mitra.dashboard');
            case 'siswa':
                return redirect()->route('siswa.dashboard');
            default:
                return redirect('/'); // Fallback jika role tidak dikenali
        }
    }

    /**
     * Menangani proses logout
     */
    public function logout()
    {
        // Tambahkan logika logout jika diperlukan, seperti menghapus session
        auth()->logout();
        return redirect()->route('login')->with('status', 'Anda telah logout.');
    }
}

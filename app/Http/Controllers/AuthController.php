<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Pastikan view ini ada
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil user dari database
        $user = DB::table('akun')->where('username', $request->username)->first();

        Log::info('Login attempt with data:', ['username' => $request->username]);

        if (!$user) {
            Log::info('Failed login attempt: Username not found.');
            return back()->withErrors(['login_error' => 'Username salah.']);
        }

        // Periksa password
        if (!Hash::check($request->password, $user->password)) {
            Log::info('Failed login attempt: Incorrect password.');
            return back()->withErrors(['login_error' => 'Password salah.']);
        }

        // Jika berhasil, autentikasi user
        Auth::loginUsingId($user->id); // Menggunakan ID user untuk autentikasi sesi
        session(['user_data' => $user]);
        Log::info('Authentication successful for user: ' . $user->username);

        // Redirect berdasarkan peran
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
                return redirect('/'); // Redirect default jika peran tidak dikenali
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
        return redirect()->route('login'); // Kembali ke halaman login
    }
}

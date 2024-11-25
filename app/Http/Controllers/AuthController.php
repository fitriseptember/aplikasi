<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        // Pastikan view 'login' tersedia
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil user dari database berdasarkan username
        $user = DB::table('akun')->where('username', $request->username)->first();

        // Log informasi saat ada percobaan login
        Log::info('Percobaan login dengan data:', ['username' => $request->username]);

        // Jika username tidak ditemukan
        if (!$user) {
            Log::info('Percobaan login gagal: Username tidak ditemukan.');
            return back()->withErrors(['login_error' => 'Username salah.']);
        }

        // Periksa apakah password cocok
        if (!Hash::check($request->password, $user->password)) {
            Log::info('Percobaan login gagal: Password salah.');
            return back()->withErrors(['login_error' => 'Password salah.']);
        }

        // Jika autentikasi berhasil, login user
        Auth::loginUsingId($user->id);
        session(['user_data' => $user]); // Simpan data user di session
        Log::info('Autentikasi berhasil untuk user: ' . $user->username);

        // Simpan waktu login ke tabel 'login_logs'
        DB::table('login_logs')->insert([
            'username' => $request->username,
            'login_time' => Carbon::now(),
        ]);

        // Redirect user berdasarkan peran
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.content');
            case 'guru':
                return redirect()->route('guru.content');
            case 'mitra':
                return redirect()->route('mitra.content');
            case 'siswa':
                return redirect()->route('siswa.content');
            default:
                // Redirect default jika peran tidak dikenali
                return redirect('/');
        }
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout(); // Logout user
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

        return response()->json($data);
    }

    // Mendapatkan data kunjungan login untuk semua user
    public function kunjungan()
    {
        // Mengambil data login dengan grup berdasarkan tanggal dan username
        $data = DB::table('login_logs')
            ->select(
                DB::raw('DATE(login_time) as date'),
                DB::raw('COUNT(*) as count'),
                'username'
            )
            ->groupBy('username', DB::raw('DATE(login_time)'))
            ->orderBy('date', 'asc')
            ->get();

        return response()->json($data);
    }
}

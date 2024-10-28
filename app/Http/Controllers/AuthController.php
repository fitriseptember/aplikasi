<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Ensure this view exists
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('akun')->where('username', $request->username)->first();

        Log::info('Login attempt with data:', ['username' => $request->username]);

        if (!$user) {
            Log::info('Failed login attempt: Username not found.');
            return back()->withErrors(['login_error' => 'Username salah.']);
        }

        if (!Hash::check($request->password, $user->password)) {
            Log::info('Failed login attempt: Incorrect password.');
            return back()->withErrors(['login_error' => 'Password salah.']);
        }

        Log::info('Authentication successful for user: ' . $user->username);

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
                return redirect('/');
        }
    }
}

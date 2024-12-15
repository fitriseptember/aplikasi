<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Attendance;
use App\Models\LaporanKegiatan;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Akun;

class MitraController extends Controller
{
    // Dashboard method
    public function dashboard()
    {
        return view('mitra.content'); // Replace with the appropriate view
    }

    // Display attendance table
    public function tabelAbsen()
    {
        $attendances = Attendance::with('user')->get();
        return view('mitra.dataAbsen', compact('attendances'));
    }

    // Generate attendance PDF
    public function generateAbsenPdf()
    {
        $attendances = Attendance::with('user')->get();

        $pdf = PDF::loadView('mitra.pdfAbsen', compact('attendances'))->setPaper('a4', 'landscape');

        return $pdf->download('data_absen_siswa.pdf');
    }

    // Display activity reports
    public function laporanKegiatan()
    {
        $laporanKegiatan = LaporanKegiatan::with('user')->get();
        return view('mitra.dataLaporan', compact('laporanKegiatan'));
    }

    // Generate activity reports PDF
    public function generatePdf()
    {
        $laporanKegiatan = LaporanKegiatan::with('user')->get();

        $data = [
            'title' => 'Laporan Kegiatan Siswa',
            'date' => date('d-m-Y'),
            'laporanKegiatan' => $laporanKegiatan,
        ];

        $pdf = PDF::loadView('mitra.pdfLaporan', $data);

        return $pdf->download('laporan_kegiatan.pdf');
    }

    // Display attendance summary and login logs
    public function content()
    {
        $hadir = Attendance::where('status', 'Hadir')->count();
        $sakit = Attendance::where('status', 'Sakit')->count();
        $izin = Attendance::where('status', 'Izin')->count();
        $alpa = Attendance::where('status', 'Alpa')->count();

        $kehadiran = [
            'Hadir' => $hadir,
            'Sakit' => $sakit,
            'Izin' => $izin,
            'Alpa' => $alpa,
        ];

        $data = DB::table('login_logs')
            ->select(DB::raw('DATE(login_time) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE(login_time)'))
            ->orderBy('date', 'asc')
            ->get();

        return view('mitra.content', compact('kehadiran', 'data'));
    }

    // Display profile page
    public function profile()
    {
        $userId = session('user_data')->id ?? null;

        if (!$userId) {
            return redirect()->route('mitra.dashboard')->with('error', 'Data pengguna tidak ditemukan.');
        }

        $user = Akun::find($userId);

        if (!$user) {
            return redirect()->route('mitra.dashboard')->with('error', 'Pengguna tidak ditemukan.');
        }

        return view('mitra.profile', compact('user'));
    }

    // Display edit profile page
    public function edit($id)
    {
        $user = Akun::find($id);

        if (!$user) {
            return redirect()->route('mitra.profile')->with('error', 'Pengguna tidak ditemukan.');
        }

        return view('mitra.edit', compact('user'));
    }

    // Update user profile
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'gender' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Akun::find($id);

        if (!$user) {
            return redirect()->route('mitra.dashboard')->with('error', 'Pengguna tidak ditemukan.');
        }

        $user->nama_lengkap = $validated['nama_lengkap'];
        $user->email = $validated['email'];
        $user->gender = $validated['gender'];

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();
        session(['user_data' => $user]);

        return redirect()->route('mitra.profile')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    // Update profile picture
    public function updatePhoto(Request $request, $id)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Akun::find($id);

        if (!$user) {
            return redirect()->route('mitra.profile', $id)->with('error', 'Pengguna tidak ditemukan.');
        }

        if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
            Storage::delete('public/' . $user->profile_picture);
        }

        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $path;
        $user->save();

        return redirect()->route('mitra.profile', $id)->with('success', 'Foto berhasil diperbarui.');
    }
}

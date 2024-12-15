<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Siswa;
use App\Models\LaporanKegiatan;
use App\Models\Akun;
use Barryvdh\DomPDF\Facade\PDF;

class GuruController extends Controller
{
    // Menampilkan dashboard
    public function dashboard()
    {
        return view('guru.content');
    }

    // Menampilkan tabel absensi
    public function tabelAbsen()
    {
        $attendances = Attendance::with('user')->get();
        return view('guru.dataAbsen', compact('attendances'));
    }

    // Generate PDF data absensi
    public function generateAbsenPdf()
    {
        $attendances = Attendance::with('user')->get();
        $pdf = PDF::loadView('guru.pdfAbsen', compact('attendances'))->setPaper('a4', 'landscape');
        return $pdf->download('data_absen_siswa.pdf');
    }

    // Menampilkan laporan kegiatan
    public function laporanKegiatan()
    {
        $laporanKegiatan = LaporanKegiatan::with('user')->get();
        return view('guru.dataLaporan', compact('laporanKegiatan'));
    }

    // Generate PDF laporan kegiatan
    public function generatePdf()
    {
        $laporanKegiatan = LaporanKegiatan::with('user')->get();
        $data = [
            'title' => 'Laporan Kegiatan Siswa',
            'date' => date('d-m-Y'),
            'laporanKegiatan' => $laporanKegiatan,
        ];
        $pdf = PDF::loadView('guru.pdfLaporan', $data);
        return $pdf->download('laporan_kegiatan.pdf');
    }

    // Menampilkan daftar siswa
    public function dataDaftarSiswa()
    {
        $accounts = Akun::where('role', 'siswa')->get();
        return view('guru.datadaftarsiswa', compact('accounts'));
    }

    // Generate PDF daftar siswa
    public function generateDaftarSiswaPdf()
    {
        $accounts = Akun::where('role', 'siswa')->get();
        $pdf = PDF::loadView('guru.pdfDaftar', compact('accounts'))->setPaper('a4', 'landscape');
        return $pdf->download('daftar_siswa.pdf');
    }

    // Menampilkan data kehadiran dan login pada dashboard
    public function content()
    {
        $kehadiran = [
            'Hadir' => Attendance::where('status', 'Hadir')->count(),
            'Sakit' => Attendance::where('status', 'Sakit')->count(),
            'Izin' => Attendance::where('status', 'Izin')->count(),
            'Alpa' => Attendance::where('status', 'Alpa')->count(),
        ];

        $data = DB::table('login_logs')
            ->select(DB::raw('DATE(login_time) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE(login_time)'))
            ->orderBy('date', 'asc')
            ->get();

        return view('guru.content', compact('kehadiran', 'data'));
    }

    // Menampilkan profil pengguna
    public function profile()
    {
        $userId = session('user_data')->id;
        $user = Akun::find($userId);
        return view('guru.profile', compact('user'));
    }

    // Menampilkan halaman edit profil
    public function edit($id)
    {
        $user = Akun::findOrFail($id);
        return view('guru.edit', compact('user'));
    }

    // Memperbarui data profil
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'gender' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Akun::findOrFail($id);
        $user->fill($validated);

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();
        session(['user_data' => $user]);

        return redirect()->route('guru.profile')->with('success', 'Profil berhasil diperbarui.');
    }

    // Memperbarui foto profil
    public function updatePhoto(Request $request, $id)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Akun::findOrFail($id);

        if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
            Storage::delete('public/' . $user->profile_picture);
        }

        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $path;
        $user->save();

        return redirect()->route('guru.profile')->with('success', 'Foto profil berhasil diperbarui.');
    }
}

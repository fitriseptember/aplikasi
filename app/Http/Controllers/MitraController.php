<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use App\Models\LaporanKegiatan;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Akun;

class MitraController extends Controller
{

    // Metode dashboard
    public function dashboard()
    {
        // Logika untuk mengambil data atau melakukan hal lain yang diperlukan
        return view('mitra.content'); // Ganti dengan view yang sesuai
    }

    public function tabelAbsen()
    {
        // Ambil data kehadiran dengan relasi user
        $attendances = Attendance::with('user')->get();
        return view('mitra.dataAbsen', compact('attendances')); // Menampilkan data absen ke tampilan admin.dataAbsen
    }

    public function generateAbsenPdf()
    {
        $attendances = Attendance::with('user')->get();

        $pdf = PDF::loadView('mitra.pdfAbsen', compact('attendances'))->setPaper('a4', 'landscape');

        return $pdf->download('data_absen_siswa.pdf');
    }

    // Metode laporanKegiatan
    public function laporanKegiatan()
{
    $laporanKegiatan = LaporanKegiatan::with('user')->get(); // Ambil data dengan relasi ke user
    return view('mitra.dataLaporan', compact('laporanKegiatan'));
}

// Metode untuk download laporan kegiatan sebagai PDF
     public function generatePdf()
    {
        $laporanKegiatan = LaporanKegiatan::with('user')->get();

        $data = [
            'title' => 'Laporan Kegiatan Siswa',
            'date' => date('d-m-Y'),
            'laporanKegiatan' => $laporanKegiatan,
        ];

        $pdf = PDF::loadView('mitra.pdfLaporan', $data);

        // Unduh file PDF dengan nama laporan_kegiatan.pdf
        return $pdf->download('laporan_kegiatan.pdf');
    }

public function content()
{
    // Ambil data kehadiran berdasarkan status untuk semua siswa
    $hadir = Attendance::where('status', 'Hadir')->count();
    $sakit = Attendance::where('status', 'Sakit')->count();
    $izin = Attendance::where('status', 'Izin')->count();
    $alpa = Attendance::where('status', 'Alpa')->count();

    // Format data kehadiran untuk dikirim ke view
    $kehadiran = [
        'Hadir' => $hadir,
        'Sakit' => $sakit,
        'Izin' => $izin,
        'Alpa' => $alpa,
    ];

    // Ambil data login untuk semua user
    // Group by the date and count total logins per day
    $data = DB::table('login_logs')
        ->select(DB::raw('DATE(login_time) as date'), DB::raw('COUNT(*) as count'))
        ->groupBy(DB::raw('DATE(login_time)'))
        ->orderBy('date', 'asc')
        ->get();

    // Kirim data ke view siswa.content
    return view('mitra.content', compact('kehadiran', 'data'));
}
    // Menampilkan halaman profil dengan data pengguna
    public function profile()
    {

        // Ambil ID pengguna dari session
        $userId = session('user_data')->id;

        $user = Akun::find($userId);

        return view('mitra.profile', compact('user'));
    }

    // Menampilkan halaman edit profil
    public function edit($id)
    {
        $user = Akun::find($id);

        if (!$user) {
            //Log::error('Pengguna dengan ID ' . $id . ' tidak ditemukan.');
            return redirect()->route('mitra.profile')->with('error', 'Pengguna tidak ditemukan.');
        }

        return view('mitra.edit', compact('user'));
    }

    // Memperbarui data profil siswa
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'gender' => 'required',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Akun::find($id);

        if (!$user) {
            return redirect()->route('mitra.index')->with('error', 'Pengguna tidak ditemukan.');
        }

        // Update data siswa
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->gender = $request->gender;

        // Tangani pembaruan foto profil
        if ($request->hasFile('profile_picture')) {
            // Hapus foto lama jika ada
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            // Simpan foto baru
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        // Perbarui data pengguna di session
        session(['user_data' => $user]);

        return redirect()->route('mitra.profile')->with('success', 'Data siswa berhasil diperbarui.');
    }


    public function updatePhoto(Request $request, $id)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Akun::find($id);

        if (!$user) {
            return redirect()->route('mitra.profil', $id)->with('error', 'Pengguna tidak ditemukan.');
        }

        // Hapus foto lama jika ada
        if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
            Storage::delete('public/' . $user->profile_picture);
        }

        // Simpan foto baru
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $path;
        $user->save();

        return redirect()->route('mitra.profile', $id)->with('success', 'Foto berhasil diperbarui.');
    }
}






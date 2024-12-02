<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function create()
    {
        return view('absensi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date_format:d-m-Y',
            'status_absensi' => 'required|in:hadir,sakit,izin',
        ]);

        Absensi::create([
            'user_id' => Auth::id(),
            'tanggal' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->tanggal)->format('Y-m-d'),
            'status_absensi' => $request->status_absensi,
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil dikirim!');
    }
}


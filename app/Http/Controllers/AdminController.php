<?php

namespace App\Http\Controllers;

use App\Models\Attendance;

class AdminController extends Controller
{
    // In AdminController

public function index()
{
    $attendances = Attendance::with('user')->get(); // Eager load the user with attendance records
    return view('admin.dashboard', compact('attendances'));
}

    public function daftar()
    {
        // Ambil semua data akun
        $accounts = Account::all();

        // Kirimkan data ke view
        return view('admin.dashboard', compact('accounts'));
    }
}

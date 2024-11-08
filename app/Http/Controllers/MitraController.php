<?php

namespace App\Http\Controllers;

use App\Models\Attendance;

class MitraController extends Controller
{
    // In AdminController

public function index()
{
    $attendances = Attendance::with('user')->get(); // Eager load the user with attendance records
    return view('mitra.dashboard', compact('attendances'));
}
}
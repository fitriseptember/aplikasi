<?php

namespace App\Http\Controllers;

use App\Models\Attendance;

class GuruController extends Controller
{
    // In GuruController

public function index()
{
    $attendances = Attendance::with('user')->get(); // Eager load the user with attendance records
    return view('guru.dashboard', compact('attendances'));
}


}
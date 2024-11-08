<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
     public function index()
    {
        return view('siswa.dashboard'); // Pastikan view ini ada di resources/views/admin/dashboard.blade.php
    }//
    
}

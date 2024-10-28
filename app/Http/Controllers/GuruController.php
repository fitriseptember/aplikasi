<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
     public function index()
    {
        return view('guru.dashboard'); // Pastikan view ini ada di resources/views/admin/dashboard.blade.php
    }//
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitraController extends Controller
{
     public function index()
    {
        return view('mitra.dashboard'); // Pastikan view ini ada di resources/views/admin/dashboard.blade.php
    }//
}

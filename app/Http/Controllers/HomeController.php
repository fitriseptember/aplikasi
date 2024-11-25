<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Menampilkan halaman home
    public function index()
    {
        return view('home'); // Pastikan file view bernama 'home.blade.php'
    }

    // Menampilkan halaman login
    public function login()
    {
        return view('login'); // Pastikan file view login sesuai dengan kebutuhan
    }
}

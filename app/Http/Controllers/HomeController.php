<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method untuk menampilkan halaman home
    public function index()
    {
        return view('home'); // pastikan file view bernama 'home.blade.php'
    }

    // Method untuk menampilkan halaman login
    public function login()
    {
        return view('login'); // pastikan view login sesuai dengan kebutuhan
    }
}

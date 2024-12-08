<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model TempatPkl digunakan untuk mengelola data tempat PKL di database.
class TempatPkl extends Model
{
    use HasFactory; // Trait HasFactory memungkinkan pembuatan data model menggunakan factory.

    // Properti $fillable menentukan atribut-atribut yang diizinkan untuk diisi secara massal.
    protected $fillable = [
        'pkl_place',     // Nama tempat PKL (misalnya: nama perusahaan atau institusi).
        'pkl_address',   // Alamat tempat PKL.
        'pkl_teacher',   // Nama guru pembimbing yang terkait dengan tempat PKL ini.
        'pkl_mentor',    // Nama mentor atau pembimbing dari tempat PKL (perusahaan/institusi).
        'pkl_student',   // Nama siswa atau daftar siswa yang melakukan PKL di tempat ini.
    ];
}

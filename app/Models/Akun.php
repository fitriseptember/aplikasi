<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akun'; // Tentukan nama tabel secara manual

    // Tentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
        'email',
        'role',
        'gender',
         'profile_picture' // Pastikan field ini bisa diisi
    ];

    // Tambahkan relasi jika diperlukan
}

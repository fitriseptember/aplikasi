<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Akun extends Authenticatable
{
    use Notifiable;

    protected $table = 'akun'; // Nama tabel di database

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
        'email',
        'role',
        'gender',
    ];

    // Kolom yang disembunyikan saat model dikonversi ke array atau JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    // Otomatis meng-hash password setiap kali diisi atau diubah
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}

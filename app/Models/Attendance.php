<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'kehadiran'; // Nama tabel yang sesuai

    protected $fillable = ['tanggal', 'status', 'user_id', 'time'];  // Menambahkan kolom 'time'

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(Akun::class, 'user_id');
    }
}

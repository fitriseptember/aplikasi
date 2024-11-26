<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    use HasFactory;

    protected $table = 'laporan_kegiatan'; // Nama tabel di database

    protected $fillable = [
        'tanggal',
        'deskripsi',
        'foto_kegiatan',
        'user_id',
        'acc',
        'time'
    ];

    // Relasi dengan model Akun
    public function user()
    {
        return $this->belongsTo(Akun::class, 'user_id'); // Pastikan 'user_id' sesuai
    }
}

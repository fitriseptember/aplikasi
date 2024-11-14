<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    use HasFactory;

    protected $table = 'laporan_kegiatan';

    protected $fillable = [
        'tanggal',
        'deskripsi',
        'foto_kegiatan',
        'user_id',
    ];

    // Di model LaporanKegiatan
public function user()
{
    return $this->belongsTo(Akun::class, 'user_id');  // Pastikan 'user_id' adalah nama kolom yang benar
}

}

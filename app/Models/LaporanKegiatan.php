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

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
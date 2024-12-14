<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'kehadiran'; // Name of the table

    protected $fillable = ['tanggal', 'status', 'tempat_pkl', 'user_id', 'time'];  // Add 'tempat_pkl'

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(Akun::class, 'user_id');
    }
}

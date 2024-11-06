<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'kehadiran';  // Pastikan nama tabel sesuai dengan database
    protected $fillable = ['tanggal', 'status', 'user_id'];

}

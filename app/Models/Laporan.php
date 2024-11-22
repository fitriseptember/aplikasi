<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    // Pastikan nama tabel sesuai dengan tabel di database
    protected $table = 'laporans';

    // Tambahkan kolom yang dapat diisi
    protected $fillable = ['nama', 'tanggal', 'status'];
}

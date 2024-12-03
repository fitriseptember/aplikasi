<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatPkl extends Model
{
    use HasFactory;

    protected $fillable = [
        'pkl_place',
        'pkl_address',
        'pkl_teacher',
        'pkl_mentor',
        'pkl_student',
    ];
}
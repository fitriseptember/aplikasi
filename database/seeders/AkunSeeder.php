<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    public function run()
    {
        DB::table('akun')->insert([
            [
                'role' => 'admin',
                'gender' => 'perempuan',
                'nama_lengkap' => 'admin',
                'username' => 'admin',
                'password' => Hash::make('@dm!n2810'),
                'email' => 'admin@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

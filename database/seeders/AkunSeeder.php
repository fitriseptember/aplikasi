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
                'nama_lengkap' => 'Fitri',
                'username' => 'fitri',
                'password' => Hash::make('adminpass'),
                'email' => 'fitri@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'guru',
                'gender' => 'perempuan',
                'nama_lengkap' => 'Ririn Pujianti',
                'username' => 'ririn',
                'password' => Hash::make('smkn2sumedang'),
                'email' => 'ririn@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'mitra',
                'gender' => 'perempuan',
                'nama_lengkap' => 'Lina Karlina',
                'username' => 'lina',
                'password' => Hash::make('edutipa'),
                'email' => 'lina@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'siswa',
                'gender' => 'perempuan',
                'nama_lengkap' => 'Lestari Rahayu',
                'username' => 'lestari',
                'password' => Hash::make('sumedang'),
                'email' => 'lestari@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

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
                'nama_lengkap' => 'Admin User', // First column
                'username' => 'admin', // Second column
                'password' => Hash::make('adminsmea'), // Third column
                'email' => 'admin@gmail.com', // Fourth column
                'role' => 'admin', // Fifth column
                'gender' => 'perempuan', // Sixth column
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more users if needed
        ]);
    }
}

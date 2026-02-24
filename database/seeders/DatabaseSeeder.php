<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus atau beri komentar pada baris User::factory() bawaan jika ada, 
        // agar tidak error karena kekurangan data NIK.

        // Buat Akun Admin
        User::create([
            'nik' => '1234567890123456',
            'name' => 'Admin Klinik',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Buat Akun Pasien (Opsional untuk testing)
        User::create([
            'nik' => '3212000000000001',
            'name' => 'Hadi Haris Kiyandi',
            'email' => 'hadi@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'pasien',
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Membuat akun admin default untuk login.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada, jika belum baru insert
        $exists = DB::table('users')->where('email', 'admin@gmail.com')->exists();

        if (!$exists) {
            DB::table('users')->insert([
                'name'       => 'Admin Kayutangan',
                'email'      => 'admin@gmail.com',
                'password'   => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

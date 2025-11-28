<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan data pengurus default
        Pengurus::create([
            'nama' => 'Nama Ketua',
            'jabatan' => 'KETUA',
            'foto' => null,
            'nomor' => '081234567890',
            'email' => 'ketua@kayutangan.com',
            'instagram' => '@ketua_kayutangan',
            'facebook' => 'Ketua Kayutangan',
            'linkedin' => 'ketua-kayutangan',
        ]);

        Pengurus::create([
            'nama' => 'Nama Wakil',
            'jabatan' => 'WAKIL',
            'foto' => null,
            'nomor' => '081234567891',
            'email' => 'wakil@kayutangan.com',
            'instagram' => '@wakil_kayutangan',
            'facebook' => 'Wakil Kayutangan',
            'linkedin' => 'wakil-kayutangan',
        ]);

        Pengurus::create([
            'nama' => 'Nama Bendahara',
            'jabatan' => 'BENDAHARA',
            'foto' => null,
            'nomor' => '081234567892',
            'email' => 'bendahara@kayutangan.com',
            'instagram' => '@bendahara_kayutangan',
            'facebook' => 'Bendahara Kayutangan',
            'linkedin' => 'bendahara-kayutangan',
        ]);
    }
}

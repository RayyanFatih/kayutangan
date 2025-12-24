<?php

namespace Database\Seeders;

use App\Models\destinasi_wisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinasiWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Pendopo Ayu Kayutangan',
                'slug' => 'pendopo-ayu-kayutangan',
                'kategori' => 'tempat nongkrong',
                'deskripsi' => 'Tempat nongkrong tradisional dengan arsitektur klasik Kayutangan yang menyajikan kopi dan minuman lokal berkualitas.',
                'alamat' => 'Jl. Basuki Rahmat No. 10, Kayutangan, Malang',
                'jam_buka_tutup' => '08:00 - 22:00',
                'gambar' => 'destinasi/sample-nongkrong.jpg',
            ],
            [
                'nama' => 'Rumah Makan Kayutangan Heritage',
                'slug' => 'rumah-makan-kayutangan-heritage',
                'kategori' => 'kuliner',
                'deskripsi' => 'Restoran dengan menu masakan lokal dan internasional yang menggabungkan cita rasa tradisional Malang dengan sentuhan modern.',
                'alamat' => 'Jl. Diponegoro No. 45, Malang',
                'jam_buka_tutup' => '10:00 - 21:00',
                'gambar' => 'destinasi/sample-kuliner.jpg',
            ],
            [
                'nama' => 'Candi Jago',
                'slug' => 'candi-jago',
                'kategori' => 'tempat wisata',
                'deskripsi' => 'Situs candi bersejarah dari abad ke-14 yang merupakan salah satu peninggalan budaya terpenting di Malang dengan arsitektur yang menakjubkan.',
                'alamat' => 'Jl. Raya Tumpang, Tumpang, Malang',
                'jam_buka_tutup' => '06:00 - 18:00',
                'gambar' => 'destinasi/sample-wisata.jpg',
            ],
        ];

        foreach ($data as $item) {
            destinasi_wisata::firstOrCreate(
                ['nama' => $item['nama']],
                $item
            );
        }
    }
}

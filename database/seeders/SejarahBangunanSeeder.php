<?php

namespace Database\Seeders;

use App\Models\sejarah_bangunan;
use Illuminate\Database\Seeder;

class SejarahBangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buildings = [
            [
                'nama_bangunan' => 'BNI Emerald',
                'deskripsi' => 'Bangunan bersejarah yang pernah menjadi kantor penting di kawasan Kayutangan. Dengan arsitektur modern yang memadukan elemen tradisional, bangunan ini tetap menjadi landmark penting di pusat kota Malang dan terus berfungsi sebagai pusat aktivitas bisnis dan keuangan.',
                'tahun_dibangun' => 1960,
                'lokasi' => 'Jl. Basuki Rahmat, Kayutangan',
            ],
            [
                'nama_bangunan' => 'Tugu Jam',
                'deskripsi' => 'Simbol ikonik Kota Malang yang telah menjadi titik rujukan warga sejak era kolonial. Tugu Jam tidak hanya berfungsi sebagai penunjuk waktu, tetapi juga menjadi pertemuan sosial masyarakat dan landmark utama yang menandai kawasan Kayutangan sebagai jantung kota.',
                'tahun_dibangun' => 1923,
                'lokasi' => 'Jl. Basuki Rahmat, Kayutangan',
            ],
            [
                'nama_bangunan' => 'Rumah Bersejarah',
                'deskripsi' => 'Residensi peninggalan era kolonial yang menampilkan arsitektur klasik Eropa dengan sentuhan lokal. Rumah ini mencerminkan gaya hidup masyarakat elite pada masa penjajahan dan tetap mempertahankan keindahan desain serta struktur aslinya hingga kini.',
                'tahun_dibangun' => 1910,
                'lokasi' => 'Kawasan Kayutangan',
            ],
            [
                'nama_bangunan' => 'Terowongan Semeru - Bromo',
                'deskripsi' => 'Terowongan bersejarah yang menghubungkan berbagai area di kawasan Kayutangan, menjadi jejak penting dari pembangunan infrastruktur masa lalu. Struktur bawah tanah ini bukan hanya fungsional tetapi juga menyimpan cerita tentang kreativitas dan inovasi masyarakat Malang dahulu kala.',
                'tahun_dibangun' => 1930,
                'lokasi' => 'Jl. Basuki Rahmat, Kayutangan',
            ],
        ];

        foreach ($buildings as $building) {
            sejarah_bangunan::create($building);
        }
    }
}

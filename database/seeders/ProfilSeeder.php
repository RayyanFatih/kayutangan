<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profil::create([
            'banner_image' => 'images/bundaran.png',
            'intro_text' => 'Selamat datang di Kayutangan Heritage, kawasan ikonik di pusat Kota Malang yang memadukan pesona sejarah dengan kehidupan modern. Kawasan ini terkenal dengan landmark bersejarah, gedung yang megah, serta suasana yang mengajak warga, pelaku usaha, dan wisatawan untuk bersantai dalam suasana yang elok dan mempesona.

Sebagai kawasan heritage yang terus dikembangkan, Kayutangan menawarkan ragam seni kota yang ramah bagi turis. Jelajahi setiap sudutnya dan temukan keunikan arsitektur kolonial, kafe-kafe modern, serta berbagai aktivitas budaya yang menghidupkan kawasan ini. Dari pagi hingga malam, Kayutangan tetap menjadi destinasi favorit untuk berkumpul, berkreasi, dan menikmati keindahan kota.',
            'aktivitas_kreatif_text' => 'Kayutangan kini menjadi salah satu pusat aktivitas kreatif dan inovasi di Kota Malang. Kafe-kafe yang berada di sini memiliki konsep yang unik dan ramah bagi pengunjung, menciptakan ruang interaksi yang hangat antara satu sama lain. Berbagai UMKM lokal turut hadir dan menghadirkan harmoni antara gaya hidup modern dengan nilai filosofi yang dinamis.

Seniman, musisi, dan para pelaku kreatif datang untuk menikmati suasana inspiratif, menjadikan Kayutangan sebagai tempat pengembangan kreativitas dan hubungan sosial. Di sini, keramahan masyarakat lokal berpadu dengan inovasi, menciptakan ekosistem yang mendukung pertumbuhan ekonomi kreatif berbasis komunitas.',
            'aktivitas_kreatif_image' => 'images/aktivitas-kreatif.jpg',
            'pejalan_kaki_text' => 'Salah satu ciri khas utama Kayutangan adalah konsep kawasan ramah pejalan kaki. Jalanan yang dulunya padat kendaraan kini disulap menjadi area pejalan kaki yang nyaman untuk dinikmati. Pengunjung dapat dengan leluasa menjelajahi setiap sudut kota sambil menikmati pemandangan bangunan bersejarah dan instalasi seni yang menghiasi kawasan.

Hal ini menjadikan Kayutangan sebagai tempat ideal untuk menghabiskan waktu bersama keluarga atau teman. Berjalan santai, berkuliner, atau sekadar menikmati area yang penuh warna ini memberikan sensasi berbeda. Konsep pedestrian-friendly membuat pengunjung merasa aman dan nyaman menjelajahi berbagai pojok menarik di Kayutangan.',
            'pejalan_kaki_image' => 'images/pejalan-kaki.jpg',
            'umkm_text' => 'Kawasan Kayutangan juga menjadi rumah bagi UMKM lokal dan komunitas lokal yang terus berkembang. Dengan konsep kawasan berbasis ekonomi kreatif, banyak pelaku usaha diberi kesempatan untuk membuka usaha dan menjalankan aktivitas bisnis mereka dengan dukungan penuh dari pemerintah dan masyarakat.

Dari kuliner tradisional hingga produk kerajinan tangan, UMKM di Kayutangan menawarkan beragam pilihan yang menarik bagi pengunjung. Kehadiran mereka tidak hanya memperkaya pengalaman wisata, tetapi juga membantu meningkatkan ekonomi lokal dan mempertahankan identitas budaya Kota Malang.',
            'umkm_image' => 'images/umkm-lokal.jpg',
            'wisata_text' => 'Dengan visual yang unik dan memukau, Kayutangan Heritage juga merupakan salah satu destinasi wisata populer di Kota Malang. Keindahan arsitektur bangunan kolonial yang masih terawat, kombinasi warna cat gedung yang khas, serta instalasi seni di berbagai sudut menciptakan spot foto yang instagramable. Setiap sudut Kayutangan mesugar visualisyang berbeda, mengundang pengunjung untuk mengabadikan momen berharga mereka di sini.',
            'wajah_baru_text' => 'Kayutangan Heritage adalah wajah baru Kota Malang yang berhasil memadukan nilai sejarah dengan kehidupan modern yang tetap menghargai warisan budaya. Berkat pengembangan yang terus dilakukan oleh pemerintah lokal, kawasan ini kini menjadi pusat dinamika kota bagi generasi muda untuk berkumpul, berkarya, dan berinovasi. Kami mengundang Anda untuk datang berkunjung, menikmati keindahan Kayutangan, mendukung pelaku UMKM lokal, dan menjadi bagian dari perjalanan revitalisasi kawasan heritage yang terus tumbuh dan berkembang.',
            'ketua_image' => 'images/ketua.png',
            'wakil_image' => 'images/wakil.png',
            'bendahara_image' => 'images/bendahara.png',
        ]);
    }
}

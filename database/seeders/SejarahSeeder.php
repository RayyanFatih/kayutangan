<?php

namespace Database\Seeders;

use App\Models\Sejarah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SejarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sejarah::create([
            'intro_text' => 'Kawasan Kayutangan merupakan salah satu titik penting dalam perjalanan perkembangan Kota Malang. Berlokasi di pusat kota, kawasan ini telah menjadi saksi bisu dinamika sosial, ekonomi, dan budaya sejak era kolonial hingga kini. Nama "Kayutangan" sendiri diyakini berasal dari keberadaan pohon kayu yang tumbuh subur di area ini, yang dulunya digunakan sebagai penunjuk arah atau simbol kawasan. Meskipun bukti fisik dari penanda itu tidak lagi ditemukan, nama tersebut tetap melekat dan menjadi bagian dari identitas kota.',
            
            'masa_kolonial_title' => 'Masa Kolonial: Pusat Aktivitas Kota',
            'masa_kolonial_image' => null,
            'masa_kolonial_text' => 'Pada masa penjajahan Belanda, Kayutangan dikenal sebagai kawasan elit dan strategis. Di sinilah berdiri berbagai fasilitas penting seperti kantor pemerintahan, pertokoan, toko-toko milik orang Eropa dan Tionghoa, serta tempat ibadah yang megah. Jalan utama yang sekarang dikenal sebagai Jalan Basuki Rahmat, menjadi salah satu jalur tersibuk dan paling prestisius di Malang saat itu.

Bangunan-bangunan bergaya art deco dan kolonial klasik dibangun di sepanjang jalan, mempermalum cita rasa arsitektur Eropa yang mendominasi wajah kota. Banyak di antaranya masih berdiri kokoh hingga hari ini dan menjadi bagian penting dari upaya pelestarian kawasan heritage.',
            
            'kemerdekaan_title' => 'Masa Kemerdekaan dan Perubahan Fungsi Kawasan',
            'kemerdekaan_text' => 'Setelah kemerdekaan, fungsi kawasan ini mulai mengalami perubahan. Beberapa bangunan dialihfungsikan untuk kebutuhan publik seperti perkantoran dan sekolah. Meskipun banyak terbengkalai, Malang tetap berusaha mempertahankan kawasan tetap utuh meskipun, terutama karena banyaknya aktivitas perdagangan dan sosial yang terus berlangsung dari generasi ke generasi.

Kawasan ini tetap menjadi pusat bisnis, tapi juga menjadi tempat pertemuan berbagai lapisan masyarakat—mulai dari para pegawai pemerintah, pedagang, seniman, hingga pelajar. Interaksi inilah yang membentuk dinamika unik dan menjadikan kawasan ini sebagai cerminan kehidupan urban kota Malang.',
            
            'revitalisasi_title' => 'Revitalisasi dan Penetapan sebagai Kawasan Heritage',
            'revitalisasi_text' => 'Memasuki abad ke-21, Kayutangan mulai menjadi perhatian pemerintah lokal sebagai kawasan bersejarah yang harus dilestarikan. Pada tahun-tahun terakhir, diluncurkan program revitalisasi besar-besaran untuk menghidupkan kembali Kayutangan sebagai kawasan heritage. Langkah ini dilakukan tidak hanya untuk menjaga arsitektur bersepuh, tetapi juga untuk mengenalkan nilai sejarah dan budaya kepada generasi muda.

Dalam proses revitalisasi, elemen-elemen historis kawasan tetap dijaga. Fasad bangunan direstorasi, jalanan ditata ulang untuk pejalan kaki, dan narasi sejarah dihidupkan kembali melalui instalasi mural, interaktif booth, serta papan wisata yang bercerita. Penetapan Kayutangan sebagai Kawasan Cagar Budaya pun menjadi langkah penting dalam upaya pelestarian kota tama.',
            
            'menjaga_jejak_title' => 'Menjaga Jejak, Membangun Masa Depan',
            'menjaga_jejak_text' => 'Sejarah Kayutangan adalah bagian penting dari cerita besar Kota Malang. Ia mengingatkan kita tentang perjalanan kota, identitas masyarakatnya, dan warisan sebagai fondasi untuk masa depan. Kini, setiap langkah di Kayutangan bukan hanya sebuah perjalanan wisata, tetapi juga langkah dalam menyusuri jejak sejarah yang hidup dan terus berkembang.',
        ]);
    }
}

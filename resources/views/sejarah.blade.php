<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah - Kayutangan Heritage</title>
    <link rel="stylesheet" href="{{ asset('css/sejarah.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">BERANDA</a></li>
            <li><a href="{{ url('/profil') }}">PROFIL</a></li>
            <li><a href="{{ url('/sejarah') }}" class="active">SEJARAH</a></li>
            <li><a href="{{ url('/event&news') }}">EVENT & NEWS</a></li>
            <li><a href="{{ url('/') }}#maps">MAPS</a></li>
            <li><a href="{{ url('/destinasi') }}">DESTINASI</a></li>
            <li><a href="{{ url('/') }}#galeri">GALERI</a></li>
        </ul>
    </nav>

    <!-- Sejarah Kayutangan Section -->
    <section class="sejarah-section">
        <div class="sejarah-container">
            <!-- Title -->
            <h1 class="sejarah-title">SEJARAH KAJOETANGAN</h1>

            <!-- Introduction Text -->
            <div class="intro-text">
                {{-- GANTI: Konten dari database atau CMS --}}
                <p>Kawasan Kayutangan merupakan salah satu titik penting dalam perjalanan perkembangan Kota Malang. Berlokasi di pusat kota, kawasan ini telah menjadi saksi bisu dinamika sosial, ekonomi, dan budaya sejak era kolonial hingga kini. Nama "Kayutangan" sendiri diyakini berasal dari keberadaan pohon kayu yang tumbuh subur di area ini, yang dulunya digunakan sebagai penunjuk arah atau simbol kawasan. Meskipun bukti fisik dari penanda itu tidak lagi ditemukan, nama tersebut tetap melekat dan menjadi bagian dari identitas kota.</p>
            </div>

            <!-- Section 1: Masa Kolonial -->
            <div class="content-section">
                <div class="content-with-image">
                    <div class="content-image left">
                        {{-- GANTI: {{ asset('storage/' . $sejarah->image_1) }} --}}
                        <img src="{{ asset('images/sejarah-kolonial.jpg') }}" alt="Masa Kolonial">
                    </div>
                    <div class="content-text right">
                        <h2>Masa Kolonial: Pusat Aktivitas Kota</h2>
                        {{-- GANTI: {!! $sejarah->content_1 !!} --}}
                        <p>Pada masa penjajahan Belanda, Kayutangan dikenal sebagai kawasan elit dan strategis. Di sinilah berdiri berbagai fasilitas penting seperti kantor pemerintahan, pertokoan, toko-toko milik orang Eropa dan Tionghoa, serta tempat ibadah yang megah. Jalan utama yang sekarang dikenal sebagai Jalan Basuki Rahmat, menjadi salah satu jalur tersibuk dan paling prestisius di Malang saat itu.</p>
                        <p>Bangunan-bangunan bergaya art deco dan kolonial klasik dibangun di sepanjang jalan, mempermalum cita rasa arsitektur Eropa yang mendominasi wajah kota. Banyak di antaranya masih berdiri kokoh hingga hari ini dan menjadi bagian penting dari upaya pelestarian kawasan heritage.</p>
                    </div>
                </div>
            </div>

            <!-- Section 2: Masa Kemerdekaan -->
            <div class="content-section">
                <h2 class="section-title">Masa Kemerdekaan dan Perubahan Fungsi Kawasan</h2>
                <div class="full-text">
                    {{-- GANTI: {!! $sejarah->content_2 !!} --}}
                    <p>Setelah kemerdekaan, fungsi kawasan ini mulai mengalami perubahan. Beberapa bangunan dialihfungsikan untuk kebutuhan publik seperti perkantoran dan sekolah. Meskipun banyak terbengkalai, Malang tetap berusaha mempertahankan kawasan tetap utuh meskipun, terutama karena banyaknya aktivitas perdagangan dan sosial yang terus berlangsung dari generasi ke generasi.</p>
                    <p>Kawasan ini tetap menjadi pusat bisnis, tapi juga menjadi tempat pertemuan berbagai lapisan masyarakat—mulai dari para pegawai pemerintah, pedagang, seniman, hingga pelajar. Interaksi inilah yang membentuk dinamika unik dan menjadikan kawasan ini sebagai cerminan kehidupan urban kota Malang.</p>
                </div>
            </div>

            <!-- Section 3: Revitalisasi -->
            <div class="content-section">
                <h2 class="section-title">Revitalisasi dan Penetapan sebagai Kawasan Heritage</h2>
                <div class="full-text">
                    {{-- GANTI: {!! $sejarah->content_3 !!} --}}
                    <p>Memasuki abad ke-21, Kayutangan mulai menjadi perhatian pemerintah lokal sebagai kawasan bersejarah yang harus dilestarikan. Pada tahun-tahun terakhir, diluncurkan program revitalisasi besar-besaran untuk menghidupkan kembali Kayutangan sebagai kawasan heritage. Langkah ini dilakukan tidak hanya untuk menjaga arsitektur bersepuh, tetapi juga untuk mengenalkan nilai sejarah dan budaya kepada generasi muda.</p>
                    <p>Dalam proses revitalisasi, elemen-elemen historis kawasan tetap dijaga. Fasad bangunan direstorasi, jalanan ditata ulang untuk pejalan kaki, dan narasi sejarah dihidupkan kembali melalui instalasi mural, interaktif booth, serta papan wisata yang bercerita. Penetapan Kayutangan sebagai Kawasan Cagar Budaya pun menjadi langkah penting dalam upaya pelestarian kota tama.</p>
                </div>
            </div>

            <!-- Section 4: Menjaga Jejak -->
            <div class="content-section">
                <h2 class="section-title">Menjaga Jejak, Membangun Masa Depan</h2>
                <div class="full-text">
                    {{-- GANTI: {!! $sejarah->content_4 !!} --}}
                    <p>Sejarah Kayutangan adalah bagian penting dari cerita besar Kota Malang. Ia mengingatkan kita tentang perjalanan kota, identitas masyarakatnya, dan warisan sebagai fondasi untuk masa depan. Kini, setiap langkah di Kayutangan bukan hanya sebuah perjalanan wisata, tetapi juga langkah dalam menyusuri jejak sejarah yang hidup dan terus berkembang.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sejarah Bangunan Section -->
    <section class="bangunan-section">
        <div class="bangunan-container">
            <h1 class="bangunan-title">SEJARAH BANGUNAN KAJOETANGAN</h1>

            <div class="bangunan-grid">
                {{-- LOOP BANGUNAN DARI DATABASE --}}
                {{-- @foreach($buildings as $building) --}}
                
                <!-- Building Card 1 - CONTOH STATIC -->
                <div class="building-card">
                    {{-- UNTUK SEMENTARA TIDAK CLICKABLE, NANTI AKAN DITAMBAHKAN --}}
                    {{-- <a href="{{ route('building.show', $building->id) }}"> --}}
                    <div class="building-image">
                        {{-- GANTI: {{ asset('storage/' . $building->image) }} --}}
                        <img src="{{ asset('images/building-1.jpg') }}" alt="Bangunan">
                        <div class="building-overlay">
                            {{-- GANTI: {{ $building->name }} --}}
                            <h3>Hotel Tugu Malang</h3>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>

                <!-- Building Card 2 -->
                <div class="building-card">
                    <div class="building-image">
                        <img src="{{ asset('images/building-2.jpg') }}" alt="Bangunan">
                        <div class="building-overlay">
                            <h3>Toko Oen</h3>
                        </div>
                    </div>
                </div>

                <!-- Building Card 3 -->
                <div class="building-card">
                    <div class="building-image">
                        <img src="{{ asset('images/building-3.jpg') }}" alt="Bangunan">
                        <div class="building-overlay">
                            <h3>Rumah</h3>
                        </div>
                    </div>
                </div>

                <!-- Building Card 4 -->
                <div class="building-card">
                    <div class="building-image">
                        <img src="{{ asset('images/building-4.jpg') }}" alt="Bangunan">
                        <div class="building-overlay">
                            <h3>Terowongan Semeroe</h3>
                        </div>
                    </div>
                </div>

                {{-- @endforeach --}}
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <!-- Logo - CLICKABLE -->
            <div class="footer-logo">
                <div class="footer-logo-circle">
                    <img src="{{ asset('images/kayutangan.jpg') }}" alt="Logo Kayutangan Heritage">
                </div>
            </div>
            
            <!-- Menu -->
            <div class="footer-menu">
                <h4>Menu</h4>
                <ul>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/profil') }}">Profil</a></li>
                    <li><a href="{{ url('/event-news') }}">Destinasi Wisata</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#feedback">Feedback</a></li>
                </ul>
            </div>

            <!-- Kontak & Social Media & Alamat -->
            <div>
                <!-- Kontak -->
                <div class="footer-contact">
                    <h4>Kontak</h4>
                    <div class="contact-item">
                        <span class="contact-icon">📱</span>
                        <span>+62 xxx xxxx xxxx</span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">✉️</span>
                        <span>info@kayutangan.com</span>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="social-section">
                    <h4>Social Media</h4>
                    <div class="social-icons">
                        <a href="#" class="social-icon" title="Instagram">📷</a>
                        <a href="#" class="social-icon" title="Facebook">f</a>
                        <a href="#" class="social-icon" title="Twitter">𝕏</a>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="address-section">
                    <h4>📍 Alamat</h4>
                    <p>Jl. Basuki Rahmat No.10, Kayutangan, Kec. Klojen, Kota Malang, Jawa Timur 65112</p>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>© 2025 Kayutangan Heritage</p>
        </div>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Kayutangan Heritage</title>
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}" class="active">BERANDA</a></li>
            <li><a href="{{ url('/profil') }}">PROFIL</a></li>
            <li><a href="{{ url('/sejarah') }}">SEJARAH</a></li>
            <li><a href="{{ url('/event&news') }}">EVENT & NEWS</a></li>
            <li><a href="{{ url('/maps') }}">MAPS</a></li>
            <li><a href="{{ url('/destinasi') }}">DESTINASI</a></li>
            <li><a href="{{ url('/galeri') }}">GALERI</a></li>
        </ul>
    </nav>

    <!-- Header -->
    <div class="profil-header">
        <h1>PROFIL</h1>
        <h2>KAJOETANGAN HERITAGE</h2>
    </div>

    <!-- Hero Image -->
    <div class="hero-profil">
        <img src="{{ asset('images/bundaran.png') }}" alt="Kayutangan Heritage">
    </div>

    <!-- Content -->
    <div class="profil-content">
        <!-- Welcome Text -->
        <div class="content-block">
            <p>
                Selamat datang di Kayutangan Heritage, kawasan ikonik di pusat Kota Malang yang memadukan 
                pesona sejarah dengan kehidupan modern. Kawasan ini terkenal dengan landmark bersejarah, 
                gedung yang megah, serta suasana yang mengajak warga, pelaku usaha, dan wisatawan untuk bersantai 
                dalam suasana yang elok dan mempesona.
            </p>
            <p>
                Sebagai kawasan heritage yang terus dikembangkan, Kayutangan menawarkan ragam seni kota yang ramah 
                bagi turis. Jelajahi setiap sudutnya dan temukan keunikan arsitektur kolonial, kafe-kafe modern, 
                serta berbagai aktivitas budaya yang menghidupkan kawasan ini. Dari pagi hingga malam, Kayutangan 
                tetap menjadi destinasi favorit untuk berkumpul, berkreasi, dan menikmati keindahan kota.
            </p>
        </div>

        <!-- Section 1: Pusat Aktivitas -->
        <div class="content-two-column">
            <div class="column-text">
                <h3>Pusat Aktivitas Kreatif dan Sosial</h3>
                <p>
                    Kayutangan kini menjadi salah satu pusat aktivitas kreatif dan inovasi di Kota Malang. 
                    Kafe-kafe yang berada di sini memiliki konsep yang unik dan ramah bagi pengunjung, 
                    menciptakan ruang interaksi yang hangat antara satu sama lain. Berbagai UMKM lokal turut 
                    hadir dan menghadirkan harmoni antara gaya hidup modern dengan nilai filosofi yang dinamis.
                </p>
                <p>
                    Seniman, musisi, dan para pelaku kreatif datang untuk menikmati suasana inspiratif, 
                    menjadikan Kayutangan sebagai tempat pengembangan kreativitas dan hubungan sosial. 
                    Di sini, keramahan masyarakat lokal berpadu dengan inovasi, menciptakan ekosistem 
                    yang mendukung pertumbuhan ekonomi kreatif berbasis komunitas.
                </p>
            </div>
            <div class="column-image">
                <img src="{{ asset('images/aktivitas-kreatif.jpg') }}" alt="Aktivitas Kreatif">
            </div>
        </div>

        <!-- Section 2: Destinasi Ramah Pejalan Kaki -->
        <div class="content-two-column">
            <div class="column-image">
                <img src="{{ asset('images/pejalan-kaki.jpg') }}" alt="Pejalan Kaki">
            </div>
            <div class="column-text">
                <h3>Destinasi Ramah Pejalan Kaki</h3>
                <p>
                    Salah satu ciri khas utama Kayutangan adalah konsep kawasan ramah pejalan kaki. 
                    Jalanan yang dulunya padat kendaraan kini disulap menjadi area pejalan kaki yang nyaman 
                    untuk dinikmati. Pengunjung dapat dengan leluasa menjelajahi setiap sudut kota sambil 
                    menikmati pemandangan bangunan bersejarah dan instalasi seni yang menghiasi kawasan.
                </p>
                <p>
                    Hal ini menjadikan Kayutangan sebagai tempat ideal untuk menghabiskan waktu bersama 
                    keluarga atau teman. Berjalan santai, berkuliner, atau sekadar menikmati area yang 
                    penuh warna ini memberikan sensasi berbeda. Konsep pedestrian-friendly membuat 
                    pengunjung merasa aman dan nyaman menjelajahi berbagai pojok menarik di Kayutangan.
                </p>
            </div>
        </div>

        <!-- Section 3: Dukungan UMKM -->
        <div class="content-two-column">
            <div class="column-text">
                <h3>Dukungan bagi UMKM dan Komunitas Lokal</h3>
                <p>
                    Kawasan Kayutangan juga menjadi rumah bagi UMKM lokal dan komunitas lokal yang 
                    terus berkembang. Dengan konsep kawasan berbasis ekonomi kreatif, banyak pelaku 
                    usaha diberi kesempatan untuk membuka usaha dan menjalankan aktivitas bisnis mereka 
                    dengan dukungan penuh dari pemerintah dan masyarakat.
                </p>
                <p>
                    Dari kuliner tradisional hingga produk kerajinan tangan, UMKM di Kayutangan 
                    menawarkan beragam pilihan yang menarik bagi pengunjung. Kehadiran mereka tidak 
                    hanya memperkaya pengalaman wisata, tetapi juga membantu meningkatkan ekonomi 
                    lokal dan mempertahankan identitas budaya Kota Malang.
                </p>
            </div>
            <div class="column-image">
                <img src="{{ asset('images/umkm-lokal.jpg') }}" alt="UMKM Lokal">
            </div>
        </div>

        <!-- Section 4: Tempat untuk Berwisata -->
        <div class="content-block">
            <h3>Tempat untuk Berwisata, Edukasi, dan Rekreasi</h3>
            <p>
                Dengan visual yang unik dan memukau, Kayutangan Heritage juga merupakan salah satu 
                destinasi wisata populer di Kota Malang. Keindahan arsitektur bangunan kolonial yang 
                masih terawat, kombinasi warna cat gedung yang khas, serta instalasi seni di berbagai 
                sudut menciptakan spot foto yang instagramable. Setiap sudut Kayutangan menyuguhkan 
                keindahan visual yang berbeda, mengundang pengunjung untuk mengabadikan momen 
                berharga mereka di sini.
            </p>
        </div>

        <!-- Section 5: Wajah Baru Kota Malang -->
        <div class="content-block">
            <h3>Kayutangan: Wajah Baru Kota Malang</h3>
            <p>
                Kayutangan Heritage adalah wajah baru Kota Malang yang berhasil memadukan nilai 
                sejarah dengan kehidupan modern yang tetap menghargai warisan budaya. Berkat 
                pengembangan yang terus dilakukan oleh pemerintah lokal, kawasan ini kini menjadi 
                pusat dinamika kota bagi generasi muda untuk berkumpul, berkarya, dan berinovasi. 
                Kami mengundang Anda untuk datang berkunjung, menikmati keindahan Kayutangan, 
                mendukung pelaku UMKM lokal, dan menjadi bagian dari perjalanan revitalisasi 
                kawasan heritage yang terus tumbuh dan berkembang.
            </p>
        </div>
    </div>

    <!-- Pengurus Section -->
    <div class="pengurus-section">
        <div class="pengurus-header">
            <h2>PENGURUS</h2>
        </div>
        <div class="pengurus-grid">
            <!-- Ketua -->
            <div class="pengurus-card">
                <img src="{{ asset('images/ketua.png') }}" alt="Ketua">
                <h4>KETUA</h4>
            </div>
            <!-- Wakil -->
            <div class="pengurus-card">
                <img src="{{ asset('images/wakil.png') }}" alt="Wakil">
                <h4>WAKIL</h4>
            </div>
            <!-- Bendahara -->
            <div class="pengurus-card">
                <img src="{{ asset('images/bendahara.png') }}" alt="Bendahara">
                <h4>BENDAHARA</h4>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <!-- Logo -->
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
                    <li><a href="{{ url('/') }}#destinasi">Destinasi Wisata</a></li>
                    <li><a href="{{ url('/') }}#galeri">Galeri</a></li>
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
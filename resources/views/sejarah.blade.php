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
            <li><a href="{{ url('/') }}" class="active">BERANDA</a></li>
            <li><a href="{{ url('/profil') }}">PROFIL</a></li>
            <li><a href="{{ url('/sejarah') }}">SEJARAH</a></li>
            <li><a href="{{ url('/event&news') }}">EVENT & NEWS</a></li>
            <li><a href="#maps">MAPS</a></li>
            <li><a href="{{ url('/destinasi') }}">DESTINASI</a></li>
            <li><a href="{{ url('/galeri') }}">GALERI</a></li>
        </ul>
    </nav>

    <!-- Sejarah Kayutangan Section -->
    <section class="sejarah-section">
        <div class="sejarah-container">
            <!-- Title -->
            <h1 class="sejarah-title">SEJARAH KAJOETANGAN</h1>

            <!-- Introduction Text -->
            <div class="intro-text">
                @if ($sejarah && $sejarah->intro_text)
                    <p>{{ $sejarah->intro_text }}</p>
                @else
                    <p><em>Belum ada data pengantar sejarah. Silakan isi melalui dashboard admin.</em></p>
                @endif
            </div>

            <!-- Section 1: Masa Kolonial -->
            <div class="content-section">
                <div class="content-with-image">
                    <div class="content-image left">
                        {{-- GANTI: {{ asset('storage/' . $sejarah->image_1) }} --}}
                        @if ($sejarah && $sejarah->masa_kolonial_image)
                            <img src="{{ asset('storage/' . $sejarah->masa_kolonial_image) }}" alt="Masa Kolonial">
                        @else
                            <img src="{{ asset('images/kayutangan-dulu.png') }}" alt="Masa Kolonial">
                        @endif
                    </div>
                    <div class="content-text right">
                        <h2>{{ $sejarah && $sejarah->masa_kolonial_title ? $sejarah->masa_kolonial_title : 'Masa Kolonial: Pusat Aktivitas Kota' }}</h2>
                        @if ($sejarah && $sejarah->masa_kolonial_text)
                            <p>{!! nl2br(e($sejarah->masa_kolonial_text)) !!}</p>
                        @else
                            <p><em>Belum ada data masa kolonial. Silakan isi melalui dashboard admin.</em></p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Section 2: Masa Kemerdekaan -->
            <div class="content-section">
                <h2 class="section-title">{{ $sejarah && $sejarah->kemerdekaan_title ? $sejarah->kemerdekaan_title : 'Masa Kemerdekaan dan Perubahan Fungsi Kawasan' }}</h2>
                <div class="full-text">
                    @if ($sejarah && $sejarah->kemerdekaan_text)
                        <p>{!! nl2br(e($sejarah->kemerdekaan_text)) !!}</p>
                    @else
                        <p><em>Belum ada data masa kemerdekaan. Silakan isi melalui dashboard admin.</em></p>
                    @endif
                </div>
            </div>

            <!-- Section 3: Revitalisasi -->
            <div class="content-section">
                <h2 class="section-title">{{ $sejarah && $sejarah->revitalisasi_title ? $sejarah->revitalisasi_title : 'Revitalisasi dan Penetapan sebagai Kawasan Heritage' }}</h2>
                <div class="full-text">
                    @if ($sejarah && $sejarah->revitalisasi_text)
                        <p>{!! nl2br(e($sejarah->revitalisasi_text)) !!}</p>
                    @else
                        <p><em>Belum ada data revitalisasi. Silakan isi melalui dashboard admin.</em></p>
                    @endif
                </div>
            </div>

            <!-- Section 4: Menjaga Jejak -->
            <div class="content-section">
                <h2 class="section-title">{{ $sejarah && $sejarah->menjaga_jejak_title ? $sejarah->menjaga_jejak_title : 'Menjaga Jejak, Membangun Masa Depan' }}</h2>
                <div class="full-text">
                    @if ($sejarah && $sejarah->menjaga_jejak_text)
                        <p>{!! nl2br(e($sejarah->menjaga_jejak_text)) !!}</p>
                    @else
                        <p><em>Belum ada data menjaga jejak. Silakan isi melalui dashboard admin.</em></p>
                    @endif
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
                @forelse($buildings as $building)
                
                <div class="building-card">
                    <div class="building-image">
                        @if ($building->gambar_bangunan)
                            <img src="{{ asset('storage/' . $building->gambar_bangunan) }}" alt="{{ $building->nama_bangunan }}">
                        @else
                            <img src="{{ asset('images/placeholder.png') }}" alt="{{ $building->nama_bangunan }}">
                        @endif
                    </div>
                    <div class="building-content">
                        <h3 class="building-title">{{ $building->nama_bangunan }}</h3>
                        <p class="building-description">{{ $building->deskripsi }}</p>
                    </div>
                </div>

                @empty
                <p style="grid-column: 1 / -1; text-align: center; color: #999; padding: 40px;">Belum ada data sejarah bangunan</p>
                @endforelse
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
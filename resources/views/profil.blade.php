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
        @if ($profil->banner_image)
            <img src="{{ asset('storage/' . $profil->banner_image) }}" alt="Kayutangan Heritage">
        @else
            <img src="{{ asset('images/bundaran.png') }}" alt="Kayutangan Heritage">
        @endif
    </div>

    <!-- Content -->
    <div class="profil-content">
        <!-- Welcome Text -->
        <div class="content-block">
            @if ($profil->intro_text)
                {!! nl2br(e($profil->intro_text)) !!}
            @endif
        </div>

        <!-- Section 1: Pusat Aktivitas -->
        <div class="content-two-column">
            <div class="column-text">
                <h3>{{ $profil->aktivitas_kreatif_title ?? 'Pusat Aktivitas Kreatif dan Sosial' }}</h3>
                @if ($profil->aktivitas_kreatif_text)
                    {!! nl2br(e($profil->aktivitas_kreatif_text)) !!}
                @endif
            </div>
            <div class="column-image">
                @if ($profil->aktivitas_kreatif_image)
                    <img src="{{ asset('storage/' . $profil->aktivitas_kreatif_image) }}" alt="Aktivitas Kreatif">
                @endif
            </div>
        </div>

        <!-- Section 2: Destinasi Ramah Pejalan Kaki -->
        <div class="content-two-column">
            <div class="column-image">
                @if ($profil->pejalan_kaki_image)
                    <img src="{{ asset('storage/' . $profil->pejalan_kaki_image) }}" alt="Pejalan Kaki">
                @endif
            </div>
            <div class="column-text">
                <h3>{{ $profil->pejalan_kaki_title ?? 'Destinasi Ramah Pejalan Kaki' }}</h3>
                @if ($profil->pejalan_kaki_text)
                    {!! nl2br(e($profil->pejalan_kaki_text)) !!}
                @endif
            </div>
        </div>

        <!-- Section 3: Dukungan UMKM -->
        <div class="content-two-column">
            <div class="column-text">
                <h3>{{ $profil->umkm_title ?? 'Dukungan bagi UMKM dan Komunitas Lokal' }}</h3>
                @if ($profil->umkm_text)
                    {!! nl2br(e($profil->umkm_text)) !!}
                @endif
            </div>
            <div class="column-image">
                @if ($profil->umkm_image)
                    <img src="{{ asset('storage/' . $profil->umkm_image) }}" alt="UMKM Lokal">
                @endif
            </div>
        </div>

        <!-- Section 4: Tempat untuk Berwisata -->
        <div class="content-block">
            <h3>{{ $profil->wisata_title ?? 'Tempat untuk Berwisata, Edukasi, dan Rekreasi' }}</h3>
            @if ($profil->wisata_text)
                {!! nl2br(e($profil->wisata_text)) !!}
            @endif
        </div>

        <!-- Section 5: Wajah Baru Kota Malang -->
        <div class="content-block">
            <h3>{{ $profil->wajah_baru_title ?? 'Kayutangan: Wajah Baru Kota Malang' }}</h3>
            @if ($profil->wajah_baru_text)
                {!! nl2br(e($profil->wajah_baru_text)) !!}
            @endif
        </div>
    </div>

    <!-- Pengurus Section -->
    <div class="pengurus-section">
        <div class="pengurus-header">
            <h2>PENGURUS</h2>
        </div>
        <div class="pengurus-grid">
            @forelse ($pengurus as $member)
                <div class="pengurus-card">
                    @if ($member->foto)
                        <img src="{{ asset('storage/' . $member->foto) }}" alt="{{ $member->nama }}">
                    @else
                        <img src="{{ asset('images/placeholder.png') }}" alt="{{ $member->nama }}">
                    @endif
                    <h4>{{ $member->jabatan ?? 'PENGURUS' }}</h4>
                    <p class="pengurus-nama">{{ $member->nama }}</p>
                </div>
            @empty
                <div class="pengurus-card">
                    <img src="{{ asset('images/ketua.png') }}" alt="Ketua">
                    <h4>KETUA</h4>
                </div>
                <div class="pengurus-card">
                    <img src="{{ asset('images/wakil.png') }}" alt="Wakil">
                    <h4>WAKIL</h4>
                </div>
                <div class="pengurus-card">
                    <img src="{{ asset('images/bendahara.png') }}" alt="Bendahara">
                    <h4>BENDAHARA</h4>
                </div>
            @endforelse
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
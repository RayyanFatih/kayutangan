<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event & News - Kayutangan Heritage</title>
    <link rel="stylesheet" href="{{ asset('css/event&news.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">BERANDA</a></li>
            <li><a href="{{ url('/profil') }}">PROFIL</a></li>
            <li><a href="{{ url('/') }}#sejarah">SEJARAH</a></li>
            <li><a href="{{ url('/event-news') }}" class="active">EVENT & NEWS</a></li>
            <li><a href="{{ url('/') }}#maps">MAPS</a></li>
            <li><a href="{{ url('/') }}#destinasi">DESTINASI</a></li>
            <li><a href="{{ url('/') }}#galeri">GALERI</a></li>
        </ul>
    </nav>

    <!-- News Section -->
    <section class="news-section">
        <div class="section-header">
            <h2>NEWS</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet ut dolore magna aliquis.</p>
        </div>

        <div class="news-grid">
            {{-- LOOP UNTUK NEWS DARI DATABASE --}}
            @forelse($news as $item)
            <div class="news-card">
                <div class="news-image">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                    @else
                        <img src="{{ asset('images/placeholder.png') }}" alt="{{ $item->judul }}">
                    @endif
                </div>
                <div class="news-content">
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ Str::limit($item->ringkasan, 200) }}</p>
                    <a href="{{ route('news.detail', ['id' => $item->id]) }}" class="btn-detail">Lihat Selengkapnya</a>
                </div>
            </div>
            @empty
            <p style="grid-column: 1 / -1; text-align: center; color: #999; padding: 40px;">Belum ada data berita</p>
            @endforelse
        </div>
    </section>

    <!-- Event Section -->
    <section class="event-section">
        <div class="section-header">
            <h2>EVENT</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet ut dolore magna aliquis.</p>
        </div>

        <div class="event-grid">
            {{-- LOOP UNTUK EVENT DARI DATABASE --}}
            @forelse($events as $item)
            <div class="event-card">
                <div class="event-image">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                    @else
                        <img src="{{ asset('images/placeholder.png') }}" alt="{{ $item->judul }}">
                    @endif
                </div>
                <div class="event-content">
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ Str::limit($item->ringkasan, 200) }}</p>
                    <a href="{{ route('event.detail', ['id' => $item->id]) }}" class="btn-detail">Lihat Selengkapnya</a>
                </div>
            </div>
            @empty
            <p style="grid-column: 1 / -1; text-align: center; color: #999; padding: 40px;">Belum ada data event</p>
            @endforelse
        </div>
    </section>

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
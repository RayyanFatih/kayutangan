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
            {{-- @foreach($news as $item) --}}
            
            <!-- News Card 1 - CONTOH STATIC -->
            <div class="news-card">
                <div class="news-image">
                    {{-- GANTI: {{ asset('storage/' . $item->image) }} --}}
                    <img src="{{ asset('images/news-1.jpg') }}" alt="News 1">
                </div>
                <div class="news-content">
                    {{-- GANTI: {{ $item->title }} --}}
                    <h3>Judul</h3>
                    
                    {{-- GANTI: {{ Str::limit($item->description, 200) }} --}}
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    
                    {{-- GANTI: route('news.show', $item->id) --}}
                    <a href="{{ url('/news') }}" class="btn-detail">Lihat Selengkapnya</a>
                </div>
            </div>

            <!-- News Card 2 - CONTOH STATIC -->
            <div class="news-card">
                <div class="news-image">
                    <img src="{{ asset('images/news-2.jpg') }}" alt="News 2">
                </div>
                <div class="news-content">
                    <h3>Judul</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya</a>
                </div>
            </div>

            <!-- News Card 3 - CONTOH STATIC -->
            <div class="news-card">
                <div class="news-image">
                    <img src="{{ asset('images/news-3.jpg') }}" alt="News 3">
                </div>
                <div class="news-content">
                    <h3>Judul</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya</a>
                </div>
            </div>

            <!-- News Card 4 - CONTOH STATIC -->
            <div class="news-card">
                <div class="news-image">
                    <img src="{{ asset('images/news-4.jpg') }}" alt="News 4">
                </div>
                <div class="news-content">
                    <h3>Judul</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya</a>
                </div>
            </div>
            
            {{-- @endforeach --}}
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
            {{-- @foreach($events as $item) --}}
            
            <!-- Event Card 1 - CONTOH STATIC -->
            <div class="event-card">
                <div class="event-image">
                    {{-- GANTI: {{ asset('storage/' . $item->image) }} --}}
                    <img src="{{ asset('images/event-1.jpg') }}" alt="Event 1">
                </div>
                <div class="event-content">
                    {{-- GANTI: {{ $item->title }} --}}
                    <h3>Judul</h3>
                    
                    {{-- GANTI: {{ Str::limit($item->description, 200) }} --}}
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    
                    {{-- GANTI: route('event.show', $item->id) --}}
                    <a href="{{ url('/event') }}" class="btn-detail">Lihat Selengkapnya</a>
                </div>
            </div>

            <!-- Event Card 2 - CONTOH STATIC -->
            <div class="event-card">
                <div class="event-image">
                    <img src="{{ asset('images/event-2.jpg') }}" alt="Event 2">
                </div>
                <div class="event-content">
                    <h3>Judul</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya</a>
                </div>
            </div>

            <!-- Event Card 3 - CONTOH STATIC -->
            <div class="event-card">
                <div class="event-image">
                    <img src="{{ asset('images/event-3.jpg') }}" alt="Event 3">
                </div>
                <div class="event-content">
                    <h3>Judul</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya</a>
                </div>
            </div>

            <!-- Event Card 4 - CONTOH STATIC -->
            <div class="event-card">
                <div class="event-image">
                    <img src="{{ asset('images/event-4.jpg') }}" alt="Event 4">
                </div>
                <div class="event-content">
                    <h3>Judul</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya</a>
                </div>
            </div>
            
            {{-- @endforeach --}}
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
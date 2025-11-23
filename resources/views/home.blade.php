<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayutangan Heritage - Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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

    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <img src="{{ asset('images/banner.png') }}" alt="Kayutangan Heritage" class="hero-bg">
        <div class="hero-overlay">
        </div>
    </section>

    <!-- Sejarah & Activities Grid Section -->
    <section class="sejarah-activities-section" id="sejarah">
        <div class="grid-container">
            <!-- Sejarah - Top Left - CLICKABLE -->
            <a href="{{ url('/sejarah') }}" class="sejarah-card-link">
                <div class="sejarah-card">
                    <div class="sejarah-label">S E J A R A H</div>
                    <img src="{{ asset('images/gereja-kayutangan-siang.jpg') }}" alt="Sejarah Kayutangan">
                </div>
            </a>

            <!-- Profil - Top Right - CLICKABLE -->
            <a href="{{ url('/profil') }}" class="profil-card-link" id="profil">
                <div class="profil-card">
                    <img src="{{ asset('images/kayutangan.jpg') }}" alt="Profil Kayutangan">
                    <div class="profil-label">P R O F I L</div>
                </div>
            </a>

            <!-- Destinasi - Bottom Left - CLICKABLE -->
            <a href="{{ url('/destinasi') }}" class="destinasi-card-link" id="destinasi">
                <div class="destinasi-card">
                    <div class="destinasi-label">D E S T I N A S I</div>
                    <img src="{{ asset('images/cafe-mera.jpg') }}" alt="Destinasi Wisata">
                </div>
            </a>

            <!-- Galeri - Bottom Right -->
             <a href="{{ url('/galeri') }}">
                <div class="galeri-card" id="galeri">
                    <img src="{{ asset('images/lepen.jpg') }}" alt="Galeri Pengunjung">
                    <div class="galeri-label">G A L E R I</div>
                </div>
            </a>
        </div>
    </section>

    <!-- Event Section -->
    <section class="event-section" id="event">
        <h2 class="event-header">EVENT & NEWS</h2>
        <div class="event-carousel">
            <button class="carousel-btn prev" onclick="moveSlide(-1)">❮</button>
            <div class="event-slides" id="eventSlides">
                <div class="event-slide">
                    <div class="event-card">
                        <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=800" alt="Art Malangan">
                        <div class="event-title">Art Malangan</div>
                    </div>
                </div>
                <div class="event-slide">
                    <div class="event-card">
                        <img src="https://images.unsplash.com/photo-1518709594023-6eab9bab7b23?w=800" alt="Malang Flower Carnival">
                        <div class="event-title">Malang Flower<br>Carnival</div>
                    </div>
                </div>
                <div class="event-slide">
                    <div class="event-card">
                        <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=800" alt="Event Music">
                        <div class="event-title">Event Music</div>
                    </div>
                </div>
                <div class="event-slide">
                    <div class="event-card">
                        <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=800" alt="Festival Budaya">
                        <div class="event-title">Festival Budaya</div>
                    </div>
                </div>
            </div>
            <button class="carousel-btn next" onclick="moveSlide(1)">❯</button>
        </div>
        <a href="{{ url('/event&news') }}" class="view-more-btn">Lihat Selengkapnya</a>
    </section>

    <!-- Maps Section -->
    <section class="maps-section" id="maps">
        <h2 class="maps-header">PETA LOKASI</h2>
        <div class="maps-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5449885983646!2d112.63014731477644!3d-7.976622394276863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6281c5e0d97b5%3A0x3027a76e352bea0!2sKayutangan%20Church!5e0!3m2!1sen!2sid!4v1635000000000!5m2!1sen!2sid" allowfullscreen loading="lazy"></iframe>
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
                    <li><a href="{{ url('/event&news') }}">Destinasi Wisata</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="{{ url('/feedback') }}">Feedback</a></li>
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

    <script>
        let currentSlide = 0;
        const slidesContainer = document.getElementById('eventSlides');
        const totalSlides = document.querySelectorAll('.event-slide').length;

        function moveSlide(direction) {
            const slidesPerView = window.innerWidth <= 768 ? 1 : 3;
            currentSlide += direction;
            
            if (currentSlide < 0) {
                currentSlide = totalSlides - slidesPerView;
            } else if (currentSlide > totalSlides - slidesPerView) {
                currentSlide = 0;
            }
            
            const slideWidth = 100 / slidesPerView;
            slidesContainer.style.transform = `translateX(-${currentSlide * slideWidth}%)`;
        }

        // Auto slide
        setInterval(() => {
            moveSlide(1);
        }, 5000);

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
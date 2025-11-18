<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Kayutangan Heritage</title>
    <link rel="stylesheet" href="{{ asset('css/galeri.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">BERANDA</a></li>
            <li><a href="{{ url('/profil') }}">PROFIL</a></li>
            <li><a href="{{ url('/sejarah') }}">SEJARAH</a></li>
            <li><a href="{{ url('/event-news') }}">EVENT & NEWS</a></li>
            <li><a href="{{ url('/') }}#maps">MAPS</a></li>
            <li><a href="{{ url('/destinasi') }}">DESTINASI</a></li>
            <li><a href="{{ url('/galeri') }}" class="active">GALERI</a></li>
        </ul>
    </nav>

    <!-- Header Section -->
    <section class="galeri-header">
        <h1>GALERI PENGUNJUNG</h1>
    </section>

    <!-- Gallery Grid Section -->
    <section class="galeri-section">
        <div class="galeri-grid" id="galeriGrid">
            {{-- LOOP GALERI DARI DATABASE --}}
            {{-- @foreach($galleries as $gallery) --}}
            
            <!-- Gallery Card 1 - CONTOH STATIC -->
            <div class="gallery-card">
                <div class="gallery-image">
                    {{-- GANTI: {{ asset('storage/' . $gallery->image) }} --}}
                    <img src="{{ asset('images/galeri-1.jpg') }}" alt="Galeri">
                </div>
                <div class="gallery-info">
                    <div class="gallery-details">
                        {{-- GANTI: {{ $gallery->photographer }} --}}
                        <h3>Nama Pengirim</h3>
                        {{-- GANTI: {{ $gallery->category }} --}}
                        <p class="category">Kategori</p>
                    </div>
                    <div class="gallery-actions">
                        <!-- Download Button -->
                        {{-- GANTI: route('gallery.download', $gallery->id) --}}
                        <a href="{{ url('/galeri/download/1') }}" class="action-btn download-btn" title="Download">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                            </svg>
                        </a>
                        <!-- Like Button -->
                        <button class="action-btn like-btn" onclick="toggleLike(1)" data-gallery-id="1" title="Like">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                            </svg>
                            {{-- GANTI: {{ $gallery->likes_count }} --}}
                            <span class="like-count">00</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gallery Card 2 -->
            <div class="gallery-card">
                <div class="gallery-image">
                    <img src="{{ asset('images/galeri-2.jpg') }}" alt="Galeri">
                </div>
                <div class="gallery-info">
                    <div class="gallery-details">
                        <h3>Nama Pengirim</h3>
                        <p class="category">Kategori</p>
                    </div>
                    <div class="gallery-actions">
                        <a href="{{ url('/galeri/download/2') }}" class="action-btn download-btn" title="Download">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                            </svg>
                        </a>
                        <button class="action-btn like-btn" onclick="toggleLike(2)" data-gallery-id="2" title="Like">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                            </svg>
                            <span class="like-count">00</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gallery Card 3 -->
            <div class="gallery-card">
                <div class="gallery-image">
                    <img src="{{ asset('images/galeri-3.jpg') }}" alt="Galeri">
                </div>
                <div class="gallery-info">
                    <div class="gallery-details">
                        <h3>Nama Pengirim</h3>
                        <p class="category">Kategori</p>
                    </div>
                    <div class="gallery-actions">
                        <a href="{{ url('/galeri/download/3') }}" class="action-btn download-btn" title="Download">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                            </svg>
                        </a>
                        <button class="action-btn like-btn" onclick="toggleLike(3)" data-gallery-id="3" title="Like">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                            </svg>
                            <span class="like-count">00</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gallery Card 4 -->
            <div class="gallery-card">
                <div class="gallery-image">
                    <img src="{{ asset('images/galeri-4.jpg') }}" alt="Galeri">
                </div>
                <div class="gallery-info">
                    <div class="gallery-details">
                        <h3>Nama Pengirim</h3>
                        <p class="category">Kategori</p>
                    </div>
                    <div class="gallery-actions">
                        <a href="{{ url('/galeri/download/4') }}" class="action-btn download-btn" title="Download">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                            </svg>
                        </a>
                        <button class="action-btn like-btn" onclick="toggleLike(4)" data-gallery-id="4" title="Like">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                            </svg>
                            <span class="like-count">00</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gallery Card 5 -->
            <div class="gallery-card">
                <div class="gallery-image">
                    <img src="{{ asset('images/galeri-5.jpg') }}" alt="Galeri">
                </div>
                <div class="gallery-info">
                    <div class="gallery-details">
                        <h3>Nama Pengirim</h3>
                        <p class="category">Kategori</p>
                    </div>
                    <div class="gallery-actions">
                        <a href="{{ url('/galeri/download/5') }}" class="action-btn download-btn" title="Download">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                            </svg>
                        </a>
                        <button class="action-btn like-btn" onclick="toggleLike(5)" data-gallery-id="5" title="Like">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                            </svg>
                            <span class="like-count">00</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gallery Card 6 -->
            <div class="gallery-card">
                <div class="gallery-image">
                    <img src="{{ asset('images/galeri-6.jpg') }}" alt="Galeri">
                </div>
                <div class="gallery-info">
                    <div class="gallery-details">
                        <h3>Nama Pengirim</h3>
                        <p class="category">Kategori</p>
                    </div>
                    <div class="gallery-actions">
                        <a href="{{ url('/galeri/download/6') }}" class="action-btn download-btn" title="Download">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                            </svg>
                        </a>
                        <button class="action-btn like-btn" onclick="toggleLike(6)" data-gallery-id="6" title="Like">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                            </svg>
                            <span class="like-count">00</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- @endforeach --}}
        </div>

        <!-- Upload Button -->
        <div class="upload-section">
            {{-- GANTI: route('gallery.upload') atau modal upload --}}
            <!-- <button class="upload-btn" onclick="window.location.href='{{ url('/galeri/upload') }}'">
                UPLOAD GAMBAR
            </button> -->
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

    <script>
        // Toggle Like Function
        function toggleLike(galleryId) {
            const button = document.querySelector(`[data-gallery-id="${galleryId}"]`);
            const likeCount = button.querySelector('.like-count');
            const svg = button.querySelector('svg');
            
            // Check if already liked (you can use localStorage or check from database)
            const isLiked = button.classList.contains('liked');
            
            // AJAX request to backend
            fetch(`/galeri/like/${galleryId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update UI
                    button.classList.toggle('liked');
                    likeCount.textContent = String(data.likes_count).padStart(2, '0');
                    
                    // Change heart fill
                    if (button.classList.contains('liked')) {
                        svg.setAttribute('fill', 'currentColor');
                    } else {
                        svg.setAttribute('fill', 'none');
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>
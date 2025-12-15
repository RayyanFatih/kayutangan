<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maps - Kayutangan Heritage</title>
    <link rel="stylesheet" href="{{ asset('css/maps.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">BERANDA</a></li>
            <li><a href="{{ url('/profil') }}">PROFIL</a></li>
            <li><a href="{{ url('/sejarah') }}">SEJARAH</a></li>
            <li><a href="{{ url('/event&news') }}">EVENT & NEWS</a></li>
            <li><a href="{{ url('/maps') }}" class="active">MAPS</a></li>
            <li><a href="{{ url('/destinasi') }}">DESTINASI</a></li>
            <li><a href="{{ url('/galeri') }}">GALERI</a></li>
        </ul>
    </nav>

    <!-- Maps Section -->
    <section class="maps-section">
        <h1 class="maps-title">MAPS</h1>
        
        <!-- Control Panel -->
        <div class="control-panel">
            <div class="control-group">
                <label for="category-select">Pilih Kategori:</label>
                <div class="select-wrapper">
                    <select id="category-select" onchange="updatePlaces()">
                        <option value="">Semua Tempat</option>
                        <option value="tempat-nongkrong">Tempat Nongkrong</option>
                        <option value="kuliner">Kuliner</option>
                        <option value="tempat-wisata">Tempat Wisata</option>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label for="place-select">Pilih Tujuan:</label>
                <div class="select-wrapper">
                    <select id="place-select" onchange="selectPlace()">
                        <option value="">-- Pilih Tempat --</option>
                    </select>
                </div>
            </div>

            <button class="btn-show-route" onclick="openGoogleMaps()">Cari</button>
        </div>

        <!-- Maps Container -->
        <div id="map" class="map-container">
            <iframe src="https://maps.google.com/maps?q=Kayutangan,+Malang,+Indonesia&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                    <li><a href="{{ url('/destinasi') }}">Destinasi Wisata</a></li>
                    <li><a href="{{ url('/galeri') }}">Galeri</a></li>
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
        // Data tempat-tempat di Kayutangan
        const places = [
            {
                id: 1,
                name: 'Gereja Kayutangan',
                category: 'tempat-wisata',
                lat: -7.9766,
                lng: 112.6302,
                description: 'Gereja bersejarah yang menjadi landmark utama Kayutangan'
            },
            {
                id: 2,
                name: 'Kafe Mera',
                category: 'kuliner',
                lat: -7.9770,
                lng: 112.6310,
                description: 'Kafe favorit dengan suasana nyaman dan kopi berkualitas'
            },
            {
                id: 3,
                name: 'Toko Tenun Kayutangan',
                category: 'tempat-wisata',
                lat: -7.9760,
                lng: 112.6315,
                description: 'Toko tenun tradisional yang menjual produk lokal'
            },
            {
                id: 4,
                name: 'Tempat Nongkrong Cozy',
                category: 'tempat-nongkrong',
                lat: -7.9765,
                lng: 112.6305,
                description: 'Tempat nongkrong dengan dekorasi unik dan nyaman'
            },
            {
                id: 5,
                name: 'Warung Kuliner Tradisional',
                category: 'kuliner',
                lat: -7.9775,
                lng: 112.6320,
                description: 'Warung makan dengan menu tradisional lokal yang lezat'
            },
            {
                id: 6,
                name: 'Gallery Seni Kayutangan',
                category: 'tempat-wisata',
                lat: -7.9755,
                lng: 112.6295,
                description: 'Galeri seni yang menampilkan karya seniman lokal'
            },
            {
                id: 7,
                name: 'Cafe Retro Kayutangan',
                category: 'tempat-nongkrong',
                lat: -7.9758,
                lng: 112.6308,
                description: 'Cafe dengan konsep retro yang Instagram-worthy'
            },
            {
                id: 8,
                name: 'Restoran Fusion Asia',
                category: 'kuliner',
                lat: -7.9780,
                lng: 112.6325,
                description: 'Restoran fusion dengan menu Asia modern yang lezat'
            }
        ];

        let currentPlaces = [...places];
        let selectedPlace = null;

        // Inisialisasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            updatePlaceSelect();
        });

        // Update dropdown tempat berdasarkan kategori
        function updatePlaces() {
            const selectedCategory = document.getElementById('category-select').value;
            
            if (selectedCategory === '') {
                currentPlaces = [...places];
            } else {
                currentPlaces = places.filter(place => place.category === selectedCategory);
            }

            updatePlaceSelect();
            selectedPlace = null;
        }

        // Update daftar tempat di dropdown
        function updatePlaceSelect() {
            const selectElement = document.getElementById('place-select');
            selectElement.innerHTML = '<option value="">-- Pilih Tempat --</option>';

            currentPlaces.forEach(place => {
                const option = document.createElement('option');
                option.value = place.id;
                option.textContent = place.name;
                selectElement.appendChild(option);
            });
        }

        // Pilih tempat
        function selectPlace() {
            const selectedId = document.getElementById('place-select').value;
            if (selectedId) {
                selectedPlace = places.find(p => p.id == selectedId);
            } else {
                selectedPlace = null;
            }
        }

        // Buka Google Maps dengan tempat yang dipilih
        function openGoogleMaps() {
            if (!selectedPlace) {
                alert('Silakan pilih tempat terlebih dahulu!');
                return;
            }

            // Buka Google Maps dengan koordinat dan nama tempat
            const googleMapsUrl = `https://www.google.com/maps/search/${encodeURIComponent(selectedPlace.name)}/@${selectedPlace.lat},${selectedPlace.lng},17z`;
            window.open(googleMapsUrl, '_blank');
        }
    </script>
</body>
</html>

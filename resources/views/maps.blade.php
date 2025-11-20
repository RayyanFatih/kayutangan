<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maps - Kayutangan Heritage</title>
    <link rel="stylesheet" href="{{ asset('css/maps.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
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

            <button class="btn-show-route" onclick="showRoute()">Tampilkan Rute</button>
            <button class="btn-clear-route" onclick="clearRoute()">Hapus Rute</button>
        </div>

        <!-- Maps Container -->
        <div id="map" class="map-container"></div>

        <!-- Place Info -->
        <div id="place-info" class="place-info" style="display: none;">
            <div class="info-content">
                <h3 id="info-name"></h3>
                <p id="info-category"></p>
                <p id="info-description"></p>
                <div class="info-coords">
                    <small id="info-coords"></small>
                </div>
            </div>
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

        // Koordinat Kayutangan (titik awal)
        const kayutanganCenter = [-7.9766, 112.6302];
        let map;
        let userMarker;
        let destinationMarker;
        let routingControl;
        let currentPlaces = [...places];

        // Inisialisasi peta
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Leaflet Map
            map = L.map('map').setView(kayutanganCenter, 15);
            
            // Tambah tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);

            // Tambah marker untuk posisi awal Kayutangan
            userMarker = L.circleMarker(kayutanganCenter, {
                radius: 8,
                fillColor: '#8B7355',
                color: '#6b5344',
                weight: 2,
                opacity: 1,
                fillOpacity: 0.8
            }).addTo(map);
            userMarker.bindPopup('Kayutangan Heritage');

            // Tambah marker untuk semua tempat
            addPlaceMarkers(currentPlaces);

            // Set default places di dropdown
            updatePlaceSelect();
        });

        // Tambah marker untuk tempat
        function addPlaceMarkers(placesToShow) {
            placesToShow.forEach(place => {
                let icon = getMarkerIcon(place.category);
                let marker = L.marker([place.lat, place.lng], { icon: icon })
                    .addTo(map)
                    .bindPopup(`<strong>${place.name}</strong><br>${place.description}`)
                    .addEventListener('click', function() {
                        document.getElementById('place-select').value = place.id;
                        showPlaceInfo(place);
                    });
            });
        }

        // Dapatkan icon berdasarkan kategori
        function getMarkerIcon(category) {
            let color;
            let emoji;
            
            switch(category) {
                case 'kuliner':
                    color = 'FF6B6B';
                    emoji = '🍽️';
                    break;
                case 'tempat-nongkrong':
                    color = 'FFD93D';
                    emoji = '☕';
                    break;
                case 'tempat-wisata':
                    color = '6BCB77';
                    emoji = '🏛️';
                    break;
                default:
                    color = '4D96FF';
                    emoji = '📍';
            }

            return L.divIcon({
                html: `<div style="font-size: 24px; color: #fff; text-shadow: 0 1px 3px rgba(0,0,0,0.5);">${emoji}</div>`,
                iconSize: [32, 32],
                className: 'custom-marker'
            });
        }

        // Update tempat berdasarkan kategori
        function updatePlaces() {
            const selectedCategory = document.getElementById('category-select').value;
            
            // Clear current markers
            map.eachLayer(layer => {
                if (layer instanceof L.Marker && layer !== userMarker) {
                    map.removeLayer(layer);
                }
            });

            // Filter tempat
            if (selectedCategory === '') {
                currentPlaces = [...places];
            } else {
                currentPlaces = places.filter(place => place.category === selectedCategory);
            }

            // Tambah marker baru
            addPlaceMarkers(currentPlaces);
            updatePlaceSelect();
        }

        // Update dropdown pilih tempat
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
                const place = places.find(p => p.id == selectedId);
                if (place) {
                    showPlaceInfo(place);
                    map.setView([place.lat, place.lng], 16);
                }
            }
        }

        // Tampilkan informasi tempat
        function showPlaceInfo(place) {
            document.getElementById('info-name').textContent = place.name;
            document.getElementById('info-category').textContent = `Kategori: ${getCategoryLabel(place.category)}`;
            document.getElementById('info-description').textContent = place.description;
            document.getElementById('info-coords').textContent = `Koordinat: ${place.lat.toFixed(4)}, ${place.lng.toFixed(4)}`;
            document.getElementById('place-info').style.display = 'block';

            // Scroll ke info
            document.getElementById('place-info').scrollIntoView({ behavior: 'smooth' });
        }

        // Dapatkan label kategori
        function getCategoryLabel(category) {
            const labels = {
                'kuliner': 'Kuliner',
                'tempat-nongkrong': 'Tempat Nongkrong',
                'tempat-wisata': 'Tempat Wisata'
            };
            return labels[category] || category;
        }

        // Tampilkan rute
        function showRoute() {
            const selectedId = document.getElementById('place-select').value;
            
            if (!selectedId) {
                alert('Silakan pilih tempat tujuan terlebih dahulu');
                return;
            }

            const destination = places.find(p => p.id == selectedId);
            
            if (destinationMarker) {
                map.removeLayer(destinationMarker);
            }

            // Tambah marker destinasi
            destinationMarker = L.marker([destination.lat, destination.lng], {
                icon: L.icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                })
            }).addTo(map);

            // Hapus routing control yang lama
            if (routingControl) {
                map.removeControl(routingControl);
            }

            // Tambah routing control
            routingControl = L.Routing.control({
                waypoints: [
                    L.latLng(kayutanganCenter[0], kayutanganCenter[1]),
                    L.latLng(destination.lat, destination.lng)
                ],
                routeWhileDragging: false,
                createMarker: function() { return null; },
                lineOptions: {
                    styles: [{color: '#8B7355', opacity: 0.7, weight: 5}]
                }
            }).addTo(map);

            // Fit bounds
            map.fitBounds([
                [kayutanganCenter[0], kayutanganCenter[1]],
                [destination.lat, destination.lng]
            ], { padding: [50, 50] });
        }

        // Hapus rute
        function clearRoute() {
            if (routingControl) {
                map.removeControl(routingControl);
                routingControl = null;
            }

            if (destinationMarker) {
                map.removeLayer(destinationMarker);
                destinationMarker = null;
            }

            document.getElementById('place-select').value = '';
            document.getElementById('place-info').style.display = 'none';
            map.setView(kayutanganCenter, 15);
        }
    </script>
</body>
</html>

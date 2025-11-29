<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata - Kayutangan Heritage</title>
    <link rel="stylesheet" href="{{ asset('css/destinasi.css') }}">
</head>

<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">BERANDA</a></li>
            <li><a href="{{ url('/profil') }}">PROFIL</a></li>
            <li><a href="{{ url('/') }}#sejarah">SEJARAH</a></li>
            <li><a href="{{ url('/event&news') }}">EVENT & NEWS</a></li>
            <li><a href="{{ url('/') }}#maps">MAPS</a></li>
            <li><a href="{{ url('/destinasi') }}" class="active">DESTINASI</a></li>
            <li><a href="{{ url('/') }}#galeri">GALERI</a></li>
        </ul>
    </nav>

    <!-- Header Section -->
    <section class="destinasi-header">
        <h1>DESTINASI WISATA</h1>
        <h2>KAJOETANGAN HERITAGE</h2>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua</p>
    </section>

    <!-- Search & Filter Section -->
    <section class="search-filter-section">
        <div class="search-filter-container">
            <!-- Search Box -->
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Cari destinasi..." onkeyup="searchDestination()">
                <button type="button" onclick="searchDestination()">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                    </svg>
                </button>
            </div>

            <!-- Category Filter -->
            <div class="category-filter">
                <select id="categoryFilter" onchange="filterByCategory()">
                    <option value="">Semua Kategori</option>
                    {{-- MENAMPILKAN KATEGORI DARI DB --}}
                    @foreach ($kategoriList as $kategori)
                        <option value="{{ $kategori }}">{{ ucfirst($kategori) }}</option>
                    @endforeach
                </select>
                <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor" class="dropdown-icon">
                    <path d="M6 9L1 4h10L6 9z" />
                </svg>
            </div>
        </div>
    </section>

    <!-- Destinasi Grid Section -->
    <section class="destinasi-section">
        <div class="destinasi-grid" id="destinasiGrid">

            {{-- LOOP DESTINASI DATABASE --}}
            @foreach ($destinasi as $item)
                <div class="destinasi-card" data-category="{{ strtolower($item->kategori) }}"
                    data-name="{{ strtolower($item->nama) }}">

                    <div class="destinasi-image">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}">
                    </div>

                    <div class="destinasi-content">
                        <h3>{{ $item->nama }}</h3>

                        <p>{{ Str::limit($item->deskripsi, 200) }}</p>

                        <div class="destinasi-category">
                            <span class="category-badge">{{ ucfirst($item->kategori) }}</span>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>

        <!-- No Results Message -->
        <div id="noResults" class="no-results" style="display: none;">
            <p>Tidak ada destinasi yang ditemukan</p>
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
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#feedback">Feedback</a></li>
                </ul>
            </div>

            <!-- Kontak & Media -->
            <div>
                <div class="footer-contact">
                    <h4>Kontak</h4>
                    <div class="contact-item"><span>📱</span> +62 xxx xxxx xxxx</div>
                    <div class="contact-item"><span>✉️</span> info@kayutangan.com</div>
                </div>

                <div class="social-section">
                    <h4>Social Media</h4>
                    <div class="social-icons">
                        <a href="#" class="social-icon">📷</a>
                        <a href="#" class="social-icon">f</a>
                        <a href="#" class="social-icon">𝕏</a>
                    </div>
                </div>

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

    {{-- SEARCH + FILTER --}}
    <script>
        function searchDestination() {
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.destinasi-card');
            const noResults = document.getElementById('noResults');
            let has = false;

            cards.forEach(card => {
                const name = card.getAttribute('data-name');
                if (name.includes(searchValue)) {
                    card.style.display = 'block';
                    has = true;
                } else {
                    card.style.display = 'none';
                }
            });

            noResults.style.display = has ? 'none' : 'block';
        }

        function filterByCategory() {
            const val = document.getElementById('categoryFilter').value;
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.destinasi-card');
            const noResults = document.getElementById('noResults');
            let has = false;

            cards.forEach(card => {
                const cat = card.getAttribute('data-category');
                const name = card.getAttribute('data-name');

                const matchCat = val === "" || cat === val;
                const matchSearch = searchValue === "" || name.includes(searchValue);

                if (matchCat && matchSearch) {
                    card.style.display = 'block';
                    has = true;
                } else {
                    card.style.display = 'none';
                }
            });

            noResults.style.display = has ? 'none' : 'block';
        }
    </script>
</body>

</html>

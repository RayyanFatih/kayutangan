<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata - Kayutangan Heritage</title>

    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/destinasi.css') }}">

</head>

<body class="bg-infinity">

@php
    $bgImage = asset('storage/' . ($bgDestinasiPath ?? 'images/bg.jpg'));
@endphp

<style>
    .bg-infinity {
        background-image: url('{{ $bgImage }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
</style>

    <!-- NAVIGATION -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">BERANDA</a></li>
            <li><a href="{{ url('/profil') }}">PROFIL</a></li>
            <li><a href="{{ url('/sejarah') }}">SEJARAH</a></li>
            <li><a href="{{ url('/event&news') }}">EVENT & NEWS</a></li>
            <li><a href="{{ url('/maps') }}">MAPS</a></li>
            <li><a href="{{ url('/destinasi') }}" class="active">DESTINASI</a></li>
            <li><a href="{{ url('/galeri') }}">GALERI</a></li>
        </ul>
    </nav>

    <!-- HEADER -->
    <section class="pt-32 pb-12 text-center relative">
        <div class="relative z-10">
            <h1 class="text-5xl md:text-6xl font-bold text-[#333] tracking-widest mb-3 uppercase">
                Destinasi Wisata
            </h1>
            <h2 class="text-3xl md:text-4xl font-bold tracking-widest text-[#555] mb-6 uppercase">
                Kajoetangan Heritage
            </h2>
            <p class="max-w-3xl mx-auto text-sm md:text-base text-gray-700 leading-relaxed">
                Nikmati suasana klasik nan hangat di Kayutangan Heritage, dari tempat nongkrong ikonik, kuliner khas,
                hingga destinasi wisata penuh cerita sejarah.
            </p>
        </div>
    </section>

    <!-- SEARCH & FILTER -->
    <section class="py-8 bg-[#f8f6f3]">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">

                <!-- SEARCH -->
                <div class="relative w-full md:flex-1">
                    <input type="text" id="searchInput"
                        class="w-full py-3 px-5 rounded-lg border border-gray-400 bg-gray-200 text-gray-800 placeholder-gray-600 focus:outline-none focus:bg-white focus:border-[#c4a366]"
                        placeholder="CARI DESTINASI" onkeyup="searchDestination()">

                    <button type="button" onclick="searchDestination()"
                        class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-600 hover:text-[#c4a366] transition">
                        🔍
                    </button>
                </div>

                <!-- CATEGORY FILTER -->
                <div class="relative w-full md:w-56">
                    <select id="categoryFilter"
                        class="w-full py-3 px-5 rounded-lg border border-gray-400 bg-gray-200 text-gray-800 focus:outline-none focus:bg-white focus:border-[#c4a366] appearance-none cursor-pointer"
                        onchange="filterByCategory()">
                        <option value="">KATEGORI</option>
                        @foreach ($kategoriList as $kategori)
                            <option value="{{ $kategori }}">{{ ucfirst($kategori) }}</option>
                        @endforeach
                    </select>

                    <span class="pointer-events-none">▼</span>
                </div>
            </div>
        </div>
    </section>

    <!-- DESTINASI GRID -->
    <section class="py-16 bg-[#f8f6f3]">
        <div id="destinasiGrid" class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            @foreach ($destinasi as $item)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 destinasi-card"
                    data-category="{{ strtolower($item->kategori) }}" data-name="{{ strtolower($item->nama) }}">

                    <!-- IMAGE -->
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ asset('storage/' . $item->gambar) }}"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>

                    <!-- CONTENT -->
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-[#333] mb-3">
                            {{ $item->nama }}
                        </h3>

                        <!-- DESKRIPSI -->
                        <p class="text-xs text-gray-600 leading-relaxed mb-3 line-clamp-3">
                            {{ $item->deskripsi }}
                        </p>

                        <!-- CATEGORY -->
                        <span class="text-xs font-bold uppercase tracking-wider text-[#4f4638]">
                            {{ ucfirst($item->kategori) }}
                        </span>
                    </div>
                </div>
            @endforeach
            


        </div>

        <!-- NO RESULTS -->
        <div id="noResults" class="hidden text-center text-gray-600 py-20 text-lg font-cormorant">
            Tidak ada destinasi yang ditemukan.
        </div>
    </section>

    <!-- FOOTER -->
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
                        <a href="https://instagram.com" target="_blank" class="social-icon" title="Instagram">📷</a>
                        <a href="https://facebook.com" target="_blank" class="social-icon" title="Facebook">f</a>
                        <a href="https://twitter.com" target="_blank" class="social-icon" title="Twitter">𝕏</a>
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
        lucide.createIcons();
    </script>

    <!-- NAVBAR SCRIPT -->
    <script>
        function searchDestination() {
            const val = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.destinasi-card');
            let found = false;

            cards.forEach(card => {
                const name = card.dataset.name;
                const show = name.includes(val);
                card.classList.toggle('hidden', !show);
                if (show) found = true;
            });

            document.getElementById('noResults').classList.toggle('hidden', found);
        }

        function filterByCategory() {
            const catVal = document.getElementById('categoryFilter').value;
            const searchVal = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.destinasi-card');
            let found = false;

            cards.forEach(card => {
                const cat = card.dataset.category;
                const name = card.dataset.name;

                const matchCat = (catVal === "" || cat === catVal);
                const matchName = (searchVal === "" || name.includes(searchVal));

                const show = matchCat && matchName;
                card.classList.toggle('hidden', !show);

                if (show) found = true;
            });

            document.getElementById('noResults').classList.toggle('hidden', found);
        }
    </script>

</body>

</html>

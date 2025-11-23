<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - Kayutangan Heritage</title>
    <link rel="stylesheet" href="{{ asset('css/feedback.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">BERANDA</a></li>
            <li><a href="{{ url('/profil') }}">PROFIL</a></li>
            <li><a href="{{ url('/sejarah') }}">SEJARAH</a></li>
            <li><a href="{{ url('/event&news') }}">EVENT & NEWS</a></li>
            <li><a href="{{ url('/maps') }}">MAPS</a></li>
            <li><a href="{{ url('/destinasi') }}">DESTINASI</a></li>
            <li><a href="{{ url('/galeri') }}">GALERI</a></li>
        </ul>
    </nav>

    <!-- Feedback Section -->
    <section class="feedback-section">
        <h1 class="feedback-title">FEEDBACK</h1>

        <!-- Alert Messages -->
        @if ($errors->any())
            <div class="alert alert-error">
                <button class="alert-close" onclick="this.parentElement.style.display='none';">&times;</button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <button class="alert-close" onclick="this.parentElement.style.display='none';">&times;</button>
                {{ session('success') }}
            </div>
        @endif

        <!-- Feedback Form Container -->
        <div class="feedback-container">
            <form action="{{ route('feedback.store') }}" method="POST" class="feedback-form">
                @csrf

                <!-- Left Column -->
                <div class="form-left">
                    <!-- Nama -->
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" 
                               value="{{ old('nama') }}" required>
                        @error('nama')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nomor -->
                    <div class="form-group">
                        <label for="nomor">Nomor</label>
                        <input type="text" id="nomor" name="nomor" placeholder="Nomor telepon atau WhatsApp" 
                               value="{{ old('nomor') }}" required>
                        @error('nomor')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email Anda" 
                               value="{{ old('email') }}" required>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select id="kategori" name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Pelayanan" {{ old('kategori') == 'Pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                            <option value="Fasilitas" {{ old('kategori') == 'Fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                            <option value="Kebersihan" {{ old('kategori') == 'Kebersihan' ? 'selected' : '' }}>Kebersihan</option>
                            <option value="Kualitas" {{ old('kategori') == 'Kualitas' ? 'selected' : '' }}>Kualitas</option>
                            <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                            <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('kategori')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="form-right">
                    <!-- Pesan -->
                    <div class="form-group textarea-group">
                        <label for="pesan">Masukan pesan....</label>
                        <textarea id="pesan" name="pesan" placeholder="Tuliskan feedback Anda di sini..." 
                                  required>{{ old('pesan') }}</textarea>
                        @error('pesan')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </form>

            <!-- Submit Button -->
            <button type="submit" form="feedback-form" class="btn-kirim" onclick="document.querySelector('form').submit()">KIRIM</button>
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
        // Fix form ID untuk submit button
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.feedback-form');
            form.id = 'feedback-form';
        });
    </script>
</body>
</html>

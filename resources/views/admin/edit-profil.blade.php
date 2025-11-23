@extends('layouts.admin')

@section('content')
<div class="profil-page-wrapper">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="sidebar-logo-img">KH</div>
            <div class="sidebar-logo-text">Kayutangan<br>Heritage</div>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.beranda') }}">
                    <span class="icon">🏠</span>
                    <span>BERANDA</span>
                </a>
            </li>
            <li>
                <a href="#" class="menu-toggle" onclick="toggleSubmenu(event, -1)" class="active">
                    <span class="icon">👤</span>
                    <span>PROFIL</span>
                    <span class="toggle-icon">▼</span>
                </a>
                <ul class="submenu active">
                    <li><a href="{{ route('admin.profil.edit') }}" class="active">EDIT PROFIL</a></li>
                    <li><a href="{{ route('admin.pengurus.index') }}">PENGURUS</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="menu-toggle" onclick="toggleSubmenu(event, 0)">
                    <span class="icon">📖</span>
                    <span>SEJARAH</span>
                    <span class="toggle-icon">▼</span>
                </a>
                <ul class="submenu">
                    <li><a href="#sejarah-kayutangan">SEJARAH KAYUTANGAN</a></li>
                    <li><a href="#sejarah-bangunan">SEJARAH BANGUNAN</a></li>
                </ul>
            </li>
            <li>
                <a href="#maps">
                    <span class="icon">🗺️</span>
                    <span>MAPS</span>
                </a>
            </li>
            <li>
                <a href="#" class="menu-toggle" onclick="toggleSubmenu(event, 1)">
                    <span class="icon">🏖️</span>
                    <span>DESTINASI</span>
                    <span class="toggle-icon">▼</span>
                </a>
                <ul class="submenu">
                    <li><a href="#tempat-nongkrong">TEMPAT NONGKRONG</a></li>
                    <li><a href="#wisata">WISATA</a></li>
                    <li><a href="#kuliner">KULINER</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="menu-toggle" onclick="toggleSubmenu(event, 2)">
                    <span class="icon">📸</span>
                    <span>EVENT & NEWS</span>
                    <span class="toggle-icon">▼</span>
                </a>
                <ul class="submenu">
                    <li><a href="#event">EVENT</a></li>
                    <li><a href="#news">NEWS</a></li>
                </ul>
            </li>
            <li>
                <a href="#galeri">
                    <span class="icon">🖼️</span>
                    <span>GALERI</span>
                </a>
            </li>
            <li>
                <a href="#feedback">
                    <span class="icon">💬</span>
                    <span>FEEDBACK</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-bottom">
            <a href="#settings">👤 Manajemen Admin</a>
            <a href="#settings">⚙️ Pengaturan Website</a>
            <a href="#logout">🚪 Logout</a>
        </div>
    </aside>

    <div class="admin-profil-container">
    <div class="page-header">
        <h1>Edit Profil Kayutangan Heritage</h1>
    </div>

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

    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- BANNER PROFIL SECTION -->
        <div class="profil-section">
            <div class="section-header">
                <h2>Banner Profil</h2>
            </div>
            
            <div class="section-content">
                <div class="form-group">
                    <label>Gambar Banner</label>
                    <div class="file-input-wrapper">
                        @if ($profil->banner_image)
                            <div class="image-preview-box">
                                <img src="{{ asset('storage/' . $profil->banner_image) }}" alt="Banner">
                                <button type="button" class="btn-remove-img" onclick="document.getElementById('banner_image').value = ''">✕ Hapus Gambar</button>
                            </div>
                        @endif
                        <input type="file" id="banner_image" name="banner_image" accept="image/*" class="file-input">
                        <label for="banner_image" class="file-input-label">Choose image...</label>
                    </div>
                    <small>Format: JPG, PNG, GIF. Ukuran maksimal: 2MB</small>
                </div>
            </div>
        </div>

        <!-- TEKS PENGANTAR SECTION -->
        <div class="profil-section">
            <div class="section-header">
                <h2>Teks Pengantar</h2>
            </div>
            
            <div class="section-content">
                <div class="form-group">
                    <label>Deskripsi Pengantar Profil</label>
                    <textarea id="intro_text" name="intro_text" rows="8" placeholder="Masukkan deskripsi pengantar profil...">{{ $profil->intro_text }}</textarea>
                </div>
            </div>
        </div>

        <!-- PUSAT AKTIVITAS KREATIF SECTION -->
        <div class="profil-section">
            <div class="section-header">
                <h2>Pusat Aktivitas Kreatif dan Sosial</h2>
            </div>
            
            <div class="section-content">
                <div class="form-row">
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="file-input-wrapper">
                            @if ($profil->aktivitas_kreatif_image)
                                <div class="image-preview-box">
                                    <img src="{{ asset('storage/' . $profil->aktivitas_kreatif_image) }}" alt="Aktivitas Kreatif">
                                    <button type="button" class="btn-remove-img">✕ Hapus Gambar</button>
                                </div>
                            @endif
                            <input type="file" id="aktivitas_kreatif_image" name="aktivitas_kreatif_image" accept="image/*" class="file-input">
                            <label for="aktivitas_kreatif_image" class="file-input-label">Choose image...</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="aktivitas_kreatif_text" name="aktivitas_kreatif_text" rows="5" placeholder="Masukkan deskripsi...">{{ $profil->aktivitas_kreatif_text }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- DESTINASI RAMAH PEJALAN KAKI SECTION -->
        <div class="profil-section">
            <div class="section-header">
                <h2>Destinasi Ramah Pejalan Kaki</h2>
            </div>
            
            <div class="section-content">
                <div class="form-row">
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="file-input-wrapper">
                            @if ($profil->pejalan_kaki_image)
                                <div class="image-preview-box">
                                    <img src="{{ asset('storage/' . $profil->pejalan_kaki_image) }}" alt="Pejalan Kaki">
                                    <button type="button" class="btn-remove-img">✕ Hapus Gambar</button>
                                </div>
                            @endif
                            <input type="file" id="pejalan_kaki_image" name="pejalan_kaki_image" accept="image/*" class="file-input">
                            <label for="pejalan_kaki_image" class="file-input-label">Choose image...</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="pejalan_kaki_text" name="pejalan_kaki_text" rows="5" placeholder="Masukkan deskripsi...">{{ $profil->pejalan_kaki_text }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- DUKUNGAN UMKM SECTION -->
        <div class="profil-section">
            <div class="section-header">
                <h2>Dukungan UMKM dan Komunitas Lokal</h2>
            </div>
            
            <div class="section-content">
                <div class="form-row">
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="file-input-wrapper">
                            @if ($profil->umkm_image)
                                <div class="image-preview-box">
                                    <img src="{{ asset('storage/' . $profil->umkm_image) }}" alt="UMKM">
                                    <button type="button" class="btn-remove-img">✕ Hapus Gambar</button>
                                </div>
                            @endif
                            <input type="file" id="umkm_image" name="umkm_image" accept="image/*" class="file-input">
                            <label for="umkm_image" class="file-input-label">Choose image...</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="umkm_text" name="umkm_text" rows="5" placeholder="Masukkan deskripsi...">{{ $profil->umkm_text }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- WISATA, EDUKASI, DAN REKREASI SECTION -->
        <div class="profil-section">
            <div class="section-header">
                <h2>Tempat untuk Berwisata, Edukasi, dan Rekreasi</h2>
            </div>
            
            <div class="section-content">
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea id="wisata_text" name="wisata_text" rows="6" placeholder="Masukkan deskripsi...">{{ $profil->wisata_text }}</textarea>
                </div>
            </div>
        </div>

        <!-- WAJAH BARU SECTION -->
        <div class="profil-section">
            <div class="section-header">
                <h2>Kayutangan: Wajah Baru Kota Malang</h2>
            </div>
            
            <div class="section-content">
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea id="wajah_baru_text" name="wajah_baru_text" rows="6" placeholder="Masukkan deskripsi...">{{ $profil->wajah_baru_text }}</textarea>
                </div>
            </div>
        </div>

        <!-- DATA PENGURUS SECTION -->
        <div class="profil-section">
            <div class="section-header">
                <h2>Data Pengurus</h2>
            </div>
            
            <div class="section-content">
                <div class="pengurus-list">
                    <div class="pengurus-item">
                        <h3>Ketua</h3>
                        <div class="form-group">
                            <label>Gambar</label>
                            <div class="file-input-wrapper">
                                @if ($profil->ketua_image)
                                    <div class="image-preview-box">
                                        <img src="{{ asset('storage/' . $profil->ketua_image) }}" alt="Ketua">
                                        <button type="button" class="btn-remove-img">✕ Hapus Gambar</button>
                                    </div>
                                @endif
                                <input type="file" id="ketua_image" name="ketua_image" accept="image/*" class="file-input">
                                <label for="ketua_image" class="file-input-label">Choose image...</label>
                            </div>
                        </div>
                    </div>

                    <div class="pengurus-item">
                        <h3>Wakil</h3>
                        <div class="form-group">
                            <label>Gambar</label>
                            <div class="file-input-wrapper">
                                @if ($profil->wakil_image)
                                    <div class="image-preview-box">
                                        <img src="{{ asset('storage/' . $profil->wakil_image) }}" alt="Wakil">
                                        <button type="button" class="btn-remove-img">✕ Hapus Gambar</button>
                                    </div>
                                @endif
                                <input type="file" id="wakil_image" name="wakil_image" accept="image/*" class="file-input">
                                <label for="wakil_image" class="file-input-label">Choose image...</label>
                            </div>
                        </div>
                    </div>

                    <div class="pengurus-item">
                        <h3>Bendahara</h3>
                        <div class="form-group">
                            <label>Gambar</label>
                            <div class="file-input-wrapper">
                                @if ($profil->bendahara_image)
                                    <div class="image-preview-box">
                                        <img src="{{ asset('storage/' . $profil->bendahara_image) }}" alt="Bendahara">
                                        <button type="button" class="btn-remove-img">✕ Hapus Gambar</button>
                                    </div>
                                @endif
                                <input type="file" id="bendahara_image" name="bendahara_image" accept="image/*" class="file-input">
                                <label for="bendahara_image" class="file-input-label">Choose image...</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ACTION BUTTONS -->
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">UPDATE</button>
            <a href="{{ route('admin.beranda') }}" class="btn btn-secondary">BATAL</a>
        </div>
        </form>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f5f5;
    }

    .profil-page-wrapper {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar Styles */
    .sidebar {
        width: 200px;
        background: linear-gradient(135deg, #8B7355 0%, #6b5344 100%);
        color: white;
        padding: 20px 0;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        height: 100vh;
        overflow-y: auto;
    }

    .sidebar-logo {
        text-align: center;
        margin-bottom: 30px;
        padding: 0 15px;
    }

    .sidebar-logo-img {
        width: 40px;
        height: 40px;
        background: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #8B7355;
        font-size: 10px;
        margin: 0 auto 8px;
    }

    .sidebar-logo-text {
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        line-height: 1.3;
    }

    .sidebar-menu {
        list-style: none;
    }

    .sidebar-menu li {
        margin: 0;
    }

    .sidebar-menu a {
        display: flex;
        align-items: center;
        padding: 12px 12px;
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none;
        font-size: 12px;
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
        gap: 8px;
    }

    .sidebar-menu a:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
        border-left-color: #d4a574;
    }

    .sidebar-menu a.active {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
        border-left-color: #d4a574;
    }

    .sidebar-menu .icon {
        width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
    }

    .sidebar-menu .toggle-icon {
        font-size: 10px;
        transition: transform 0.3s ease;
        margin-left: auto;
    }

    .sidebar-menu .submenu {
        list-style: none;
        margin: 0;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .sidebar-menu .submenu.active {
        max-height: 500px;
    }

    .sidebar-menu .submenu a {
        padding: 10px 12px 10px 40px;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.7);
        background-color: rgba(0, 0, 0, 0.1);
        border-left: 3px solid transparent;
        gap: 6px;
    }

    .sidebar-menu .submenu a:hover {
        background-color: rgba(0, 0, 0, 0.2);
        color: rgba(255, 255, 255, 0.95);
        border-left-color: #d4a574;
    }

    .sidebar-menu a.menu-toggle {
        justify-content: space-between;
    }

    .sidebar-bottom {
        position: absolute;
        bottom: 20px;
        width: 100%;
        padding-top: 15px;
    }

    .sidebar-bottom a {
        display: flex;
        align-items: center;
        padding: 8px 12px;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-size: 11px;
        transition: all 0.3s ease;
        gap: 6px;
    }

    .sidebar-bottom a:hover {
        color: #fff;
    }

    /* Main Content */
    .admin-profil-container {
        margin-left: 200px;
        flex: 1;
        padding: 40px 80px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .page-header {
        text-align: center;
        margin-bottom: 50px;
        width: 100%;
    }

    .page-header h1 {
        color: #4f4638;
        font-size: 32px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
        border-left: 4px solid;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border-left-color: #28a745;
    }

    .alert-error {
        background: #f8d7da;
        color: #721c24;
        border-left-color: #dc3545;
    }

    .alert ul {
        list-style: none;
        margin: 0;
    }

    .alert-close {
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: inherit;
        float: right;
    }

    /* Profil Section Styles */
    .profil-section {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
        overflow: hidden;
        width: 100%;
        max-width: 900px;
    }

    .section-header {
        background: linear-gradient(135deg, #8B7355 0%, #6b5344 100%);
        padding: 20px 30px;
        color: white;
    }

    .section-header h2 {
        font-size: 18px;
        font-weight: 600;
        margin: 0;
        letter-spacing: 0.5px;
    }

    .section-content {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #4f4638;
        margin-bottom: 10px;
    }

    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-family: inherit;
        font-size: 13px;
        line-height: 1.6;
        resize: vertical;
        transition: border-color 0.3s;
    }

    .form-group textarea:focus {
        outline: none;
        border-color: #8B7355;
        box-shadow: 0 0 0 3px rgba(139, 115, 85, 0.1);
    }

    .form-group textarea::placeholder {
        color: #999;
    }

    /* Form Row for side-by-side layout */
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        align-items: flex-start;
    }

    .form-row .form-group {
        margin-bottom: 0;
    }

    /* File Input Styling */
    .file-input-wrapper {
        position: relative;
    }

    .file-input {
        display: none;
    }

    .file-input-label {
        display: block;
        padding: 12px 15px;
        background: #f8f6f3;
        border: 1px solid #ddd;
        border-radius: 6px;
        text-align: center;
        cursor: pointer;
        font-size: 13px;
        color: #666;
        transition: all 0.3s;
    }

    .file-input-label:hover {
        background: #f0ede9;
        border-color: #8B7355;
        color: #4f4638;
    }

    .file-input:checked + .file-input-label {
        background: #fff;
    }

    .image-preview-box {
        position: relative;
        margin-bottom: 15px;
        display: inline-block;
    }

    .image-preview-box img {
        max-width: 150px;
        max-height: 150px;
        border-radius: 6px;
        border: 1px solid #ddd;
        display: block;
    }

    .btn-remove-img {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #d4a574;
        color: white;
        border: none;
        padding: 6px 10px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 11px;
        font-weight: 600;
        transition: background 0.3s;
    }

    .btn-remove-img:hover {
        background: #c89968;
    }

    .form-group small {
        display: block;
        color: #999;
        font-size: 12px;
        margin-top: 5px;
    }

    /* Pengurus List */
    .pengurus-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .pengurus-item {
        background: #f8f6f3;
        padding: 20px;
        border-radius: 8px;
    }

    .pengurus-item h3 {
        font-size: 14px;
        color: #4f4638;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .pengurus-item .form-group {
        margin-bottom: 0;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        padding: 30px;
        background: #f8f6f3;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .btn {
        padding: 12px 40px;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s;
        display: inline-block;
        text-align: center;
    }

    .btn-primary {
        background: linear-gradient(135deg, #d4a574 0%, #c89968 100%);
        color: #333;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(212, 165, 116, 0.3);
    }

    .btn-secondary {
        background: #ddd;
        color: #333;
    }

    .btn-secondary:hover {
        background: #ccc;
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .admin-profil-container {
            padding: 30px 20px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .pengurus-list {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            left: -200px;
            z-index: 1000;
            transition: left 0.3s ease;
            width: 200px;
            top: 0;
        }

        .sidebar.active {
            left: 0;
        }

        .admin-profil-container {
            margin-left: 0;
            padding: 20px 15px;
        }

        .page-header h1 {
            font-size: 24px;
        }

        .section-content {
            padding: 20px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .pengurus-list {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            width: 100%;
        }

        .section-header h2 {
            font-size: 16px;
        }
    }
</style>

<script>
    function toggleSubmenu(event, index) {
        event.preventDefault();
        const submenu = event.currentTarget.closest('li').querySelector('.submenu');
        if (submenu) {
            submenu.classList.toggle('active');
            const toggleIcon = event.currentTarget.querySelector('.toggle-icon');
            if (toggleIcon) {
                toggleIcon.textContent = submenu.classList.contains('active') ? '▲' : '▼';
            }
        }
    }
</script>
@endsection
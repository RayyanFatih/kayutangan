@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset('css-admin/edit-profil.css') }}">
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
                <a href="{{ route('admin.feedback.index') }}">
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
                    <small>Format: JPG, PNG, GIF. Ukuran maksimal: 10MB</small>
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
            <div class="section-content">
                <div class="form-group">
                    <label>Pusat Aktivitas Kreatif dan Sosial</label>
                    <input type="text" name="aktivitas_kreatif_title" placeholder="Masukkan judul section..." value="{{ $profil->aktivitas_kreatif_title ?? 'Pusat Aktivitas Kreatif dan Sosial' }}">
                </div>

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
            <div class="section-content">
                <div class="form-group">
                    <label>Destinasi Ramah Pejalan Kaki</label>
                    <input type="text" name="pejalan_kaki_title" placeholder="Masukkan judul section..." value="{{ $profil->pejalan_kaki_title ?? 'Destinasi Ramah Pejalan Kaki' }}">
                </div>

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
            <div class="section-content">
                <div class="form-group">
                    <label>Dukungan UMKM dan Komunitas Lokal</label>
                    <input type="text" name="umkm_title" placeholder="Masukkan judul section..." value="{{ $profil->umkm_title ?? 'Dukungan UMKM dan Komunitas Lokal' }}">
                </div>

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
            <div class="section-content">
                <div class="form-group">
                    <label>Tempat untuk Berwisata, Edukasi, dan Rekreasi</label>
                    <input type="text" name="wisata_title" placeholder="Masukkan judul section..." value="{{ $profil->wisata_title ?? 'Tempat untuk Berwisata, Edukasi, dan Rekreasi' }}">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea id="wisata_text" name="wisata_text" rows="6" placeholder="Masukkan deskripsi...">{{ $profil->wisata_text }}</textarea>
                </div>
            </div>
        </div>

        <!-- WAJAH BARU SECTION -->
        <div class="profil-section">
            <div class="section-content">
                <div class="form-group">
                    <label>Kayutangan: Wajah Baru Kota Malang</label>
                    <input type="text" name="wajah_baru_title" placeholder="Masukkan judul section..." value="{{ $profil->wajah_baru_title ?? 'Kayutangan: Wajah Baru Kota Malang' }}">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea id="wajah_baru_text" name="wajah_baru_text" rows="6" placeholder="Masukkan deskripsi...">{{ $profil->wajah_baru_text }}</textarea>
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
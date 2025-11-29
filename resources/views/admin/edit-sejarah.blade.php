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
                <ul class="submenu active">
                    <li><a href="{{ route('sejarah.edit-view') }}" class="active">SEJARAH KAYUTANGAN</a></li>
                    <li><a href="{{ route('admin.sejarah-bangunan.index') }}">SEJARAH BANGUNAN</a></li>
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
            <h1>Edit Sejarah Kayutangan</h1>
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

        <form action="{{ route('admin.sejarah.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- TEKS PENGANTAR SECTION -->
            <div class="profil-section">
                <div class="section-header">
                    <h2>Teks Pengantar Sejarah</h2>
                </div>
                
                <div class="section-content">
                    <div class="form-group">
                        <label>Deskripsi Pengantar</label>
                        <textarea id="intro_text" name="intro_text" rows="8" placeholder="Masukkan deskripsi pengantar sejarah...">{{ $sejarah && $sejarah->intro_text ? $sejarah->intro_text : '' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- MASA KOLONIAL SECTION -->
            <div class="profil-section">
                <div class="section-header">
                    <h2>Masa Kolonial: Pusat Aktivitas Kota</h2>
                </div>
                
                <div class="section-content">
                    <div class="form-group">
                        <label>Judul Section</label>
                        <input type="text" name="masa_kolonial_title" placeholder="Masukkan judul section..." value="{{ $sejarah && $sejarah->masa_kolonial_title ? $sejarah->masa_kolonial_title : 'Masa Kolonial: Pusat Aktivitas Kota' }}">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Gambar</label>
                            <div class="file-input-wrapper">
                                @if ($sejarah && $sejarah->masa_kolonial_image)
                                    <div class="image-preview-box">
                                        <img src="{{ asset('storage/' . $sejarah->masa_kolonial_image) }}" alt="Masa Kolonial">
                                        <button type="button" class="btn-remove-img" onclick="document.getElementById('masa_kolonial_image').value = ''">✕ Hapus Gambar</button>
                                    </div>
                                @endif
                                <input type="file" id="masa_kolonial_image" name="masa_kolonial_image" accept="image/*" class="file-input">
                                <label for="masa_kolonial_image" class="file-input-label">Choose image...</label>
                            </div>
                            <small>Format: JPG, PNG, GIF. Ukuran maksimal: 10MB</small>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="masa_kolonial_text" name="masa_kolonial_text" rows="6" placeholder="Masukkan deskripsi...">{{ $sejarah && $sejarah->masa_kolonial_text ? $sejarah->masa_kolonial_text : '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MASA KEMERDEKAAN SECTION -->
            <div class="profil-section">
                <div class="section-header">
                    <h2>Masa Kemerdekaan dan Perubahan Fungsi Kawasan</h2>
                </div>
                
                <div class="section-content">
                    <div class="form-group">
                        <label>Judul Section</label>
                        <input type="text" name="kemerdekaan_title" placeholder="Masukkan judul section..." value="{{ $sejarah && $sejarah->kemerdekaan_title ? $sejarah->kemerdekaan_title : 'Masa Kemerdekaan dan Perubahan Fungsi Kawasan' }}">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="kemerdekaan_text" name="kemerdekaan_text" rows="8" placeholder="Masukkan deskripsi...">{{ $sejarah && $sejarah->kemerdekaan_text ? $sejarah->kemerdekaan_text : '' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- REVITALISASI SECTION -->
            <div class="profil-section">
                <div class="section-header">
                    <h2>Revitalisasi dan Penetapan sebagai Kawasan Heritage</h2>
                </div>
                
                <div class="section-content">
                    <div class="form-group">
                        <label>Judul Section</label>
                        <input type="text" name="revitalisasi_title" placeholder="Masukkan judul section..." value="{{ $sejarah && $sejarah->revitalisasi_title ? $sejarah->revitalisasi_title : 'Revitalisasi dan Penetapan sebagai Kawasan Heritage' }}">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="revitalisasi_text" name="revitalisasi_text" rows="8" placeholder="Masukkan deskripsi...">{{ $sejarah && $sejarah->revitalisasi_text ? $sejarah->revitalisasi_text : '' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- MENJAGA JEJAK SECTION -->
            <div class="profil-section">
                <div class="section-header">
                    <h2>Menjaga Jejak, Membangun Masa Depan</h2>
                </div>
                
                <div class="section-content">
                    <div class="form-group">
                        <label>Judul Section</label>
                        <input type="text" name="menjaga_jejak_title" placeholder="Masukkan judul section..." value="{{ $sejarah && $sejarah->menjaga_jejak_title ? $sejarah->menjaga_jejak_title : 'Menjaga Jejak, Membangun Masa Depan' }}">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="menjaga_jejak_text" name="menjaga_jejak_text" rows="8" placeholder="Masukkan deskripsi...">{{ $sejarah && $sejarah->menjaga_jejak_text ? $sejarah->menjaga_jejak_text : '' }}</textarea>
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

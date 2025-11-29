@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset('css-admin/edit-bangunan.css') }}">

@section('content')
<div class="sejarah-bangunan-page-wrapper">
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
                <a href="#" class="menu-toggle" onclick="toggleSubmenu(event, -1)">
                    <span class="icon">👤</span>
                    <span>PROFIL</span>
                    <span class="toggle-icon">▼</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('admin.profil.edit') }}">EDIT PROFIL</a></li>
                    <li><a href="{{ route('admin.pengurus.index') }}">PENGURUS</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="menu-toggle" onclick="toggleSubmenu(event, 0)" class="active">
                    <span class="icon">📖</span>
                    <span>SEJARAH</span>
                    <span class="toggle-icon">▼</span>
                </a>
                <ul class="submenu active">
                    <li><a href="#sejarah-kayutangan">SEJARAH KAYUTANGAN</a></li>
                    <li><a href="{{ route('admin.sejarah-bangunan.index') }}" class="active">SEJARAH BANGUNAN</a></li>
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

    <div class="sejarah-bangunan-container">
        <div class="page-header">
            <h1>SEJARAH BANGUNAN</h1>
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

        <!-- Grid Bangunan -->
        <div class="bangunan-grid">
            @forelse ($buildings as $item)
                <div class="bangunan-card">
                    <div class="bangunan-image-wrapper">
                        @if ($item->gambar_bangunan)
                            <img src="{{ asset('storage/' . $item->gambar_bangunan) }}" alt="{{ $item->nama_bangunan }}">
                        @else
                            <div class="bangunan-placeholder">🏛️</div>
                        @endif
                    </div>

                    <div class="bangunan-info">
                        <p class="bangunan-name">{{ $item->nama_bangunan }}</p>
                        <p class="bangunan-description-preview">{{ Str::limit($item->deskripsi, 80, '...') }}</p>
                    </div>

                    <div class="bangunan-actions">
                        <button type="button" class="btn-edit" data-id="{{ $item->id }}" onclick="editBangunan(this.dataset.id)">UBAH</button>
                        <form action="{{ route('admin.sejarah-bangunan.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus bangunan ini?')">🗑️</button>
                        </form>
                    </div>
                </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: #999; padding: 40px;">Belum ada data sejarah bangunan</p>
            @endforelse
        </div>

        <!-- Tombol Tambah Bangunan -->
        <div class="add-bangunan-section">
            <button type="button" class="btn-tambah" onclick="addBangunan()">TAMBAH BANGUNAN</button>
        </div>
    </div>
</div>

<!-- Modal Edit Bangunan -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <h2>Edit Bangunan</h2>

        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Gambar Bangunan</label>
                <div class="file-input-wrapper">
                    <div id="photoPreview" class="image-preview-box" style="display: none;">
                        <img id="previewImg" src="" alt="Preview">
                        <button type="button" class="btn-remove-img" onclick="removePhoto()">✕ Hapus Foto</button>
                    </div>
                    <input type="file" id="photoInput" name="gambar_bangunan" accept="image/*" class="file-input">
                    <label for="photoInput" class="file-input-label">Choose image...</label>
                </div>
                <small>Format: JPG, PNG, GIF. Ukuran maksimal: 10MB</small>
            </div>

            <div class="form-group">
                <label for="nama">Nama Bangunan</label>
                <input type="text" id="nama" name="nama_bangunan" required placeholder="Masukkan nama bangunan...">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" required placeholder="Masukkan deskripsi bangunan..." rows="5" style="width: 100%; padding: 10px 15px; border: 1px solid #ddd; border-radius: 6px; font-family: inherit; font-size: 14px;"></textarea>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun Dibangun</label>
                <input type="number" id="tahun" name="tahun_dibangun" placeholder="Masukkan tahun..." min="1800" max="{{ date('Y') }}">
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan lokasi bangunan...">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">SIMPAN</button>
                <button type="button" class="btn-cancel" onclick="closeModal()">BATAL</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Bangunan -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeAddModal()">&times;</span>
        <h2>Tambah Bangunan</h2>

        <form id="addForm" method="POST" action="{{ route('admin.sejarah-bangunan.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Gambar Bangunan</label>
                <div class="file-input-wrapper">
                    <div id="addPhotoPreview" class="image-preview-box" style="display: none;">
                        <img id="addPreviewImg" src="" alt="Preview">
                        <button type="button" class="btn-remove-img" onclick="removeAddPhoto()">✕ Hapus Foto</button>
                    </div>
                    <input type="file" id="addPhotoInput" name="gambar_bangunan" accept="image/*" class="file-input">
                    <label for="addPhotoInput" class="file-input-label">Choose image...</label>
                </div>
                <small>Format: JPG, PNG, GIF. Ukuran maksimal: 10MB</small>
            </div>

            <div class="form-group">
                <label for="addNama">Nama Bangunan</label>
                <input type="text" id="addNama" name="nama_bangunan" required placeholder="Masukkan nama bangunan...">
            </div>

            <div class="form-group">
                <label for="addDeskripsi">Deskripsi</label>
                <textarea id="addDeskripsi" name="deskripsi" required placeholder="Masukkan deskripsi bangunan..." rows="5" style="width: 100%; padding: 10px 15px; border: 1px solid #ddd; border-radius: 6px; font-family: inherit; font-size: 14px;"></textarea>
            </div>

            <div class="form-group">
                <label for="addTahun">Tahun Dibangun</label>
                <input type="number" id="addTahun" name="tahun_dibangun" placeholder="Masukkan tahun..." min="1800" max="{{ date('Y') }}">
            </div>

            <div class="form-group">
                <label for="addLokasi">Lokasi</label>
                <input type="text" id="addLokasi" name="lokasi" placeholder="Masukkan lokasi bangunan...">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">SIMPAN</button>
                <button type="button" class="btn-cancel" onclick="closeAddModal()">BATAL</button>
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

    function editBangunan(id) {
        // Get bangunan data via AJAX
        fetch(`/admin/sejarah-bangunan/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('nama').value = data.nama_bangunan;
                document.getElementById('deskripsi').value = data.deskripsi;
                document.getElementById('tahun').value = data.tahun_dibangun || '';
                document.getElementById('lokasi').value = data.lokasi || '';

                if (data.gambar_bangunan) {
                    document.getElementById('previewImg').src = `/storage/${data.gambar_bangunan}`;
                    document.getElementById('photoPreview').style.display = 'block';
                } else {
                    document.getElementById('photoPreview').style.display = 'none';
                }

                document.getElementById('editForm').action = `/admin/sejarah-bangunan/${id}`;
                document.getElementById('editModal').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    }

    function addBangunan() {
        // Clear form
        document.getElementById('addForm').reset();
        document.getElementById('addPhotoPreview').style.display = 'none';

        // Show modal
        document.getElementById('addModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    function closeAddModal() {
        document.getElementById('addModal').style.display = 'none';
    }

    function removePhoto() {
        document.getElementById('photoInput').value = '';
        document.getElementById('photoPreview').style.display = 'none';
    }

    function removeAddPhoto() {
        document.getElementById('addPhotoInput').value = '';
        document.getElementById('addPhotoPreview').style.display = 'none';
    }

    // Photo preview handlers
    document.addEventListener('DOMContentLoaded', function() {
        const photoInput = document.getElementById('photoInput');
        if (photoInput) {
            photoInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('previewImg').src = event.target.result;
                        document.getElementById('photoPreview').style.display = 'block';
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }

        const addPhotoInput = document.getElementById('addPhotoInput');
        if (addPhotoInput) {
            addPhotoInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('addPreviewImg').src = event.target.result;
                        document.getElementById('addPhotoPreview').style.display = 'block';
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }
    });

    // Close modal when clicking outside
    window.onclick = function(event) {
        const editModal = document.getElementById('editModal');
        const addModal = document.getElementById('addModal');
        if (event.target == editModal) {
            editModal.style.display = 'none';
        }
        if (event.target == addModal) {
            addModal.style.display = 'none';
        }
    };
</script>

@endsection

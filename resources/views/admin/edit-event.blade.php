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
                <a href="#" class="menu-toggle" onclick="toggleSubmenu(event, 0)">
                    <span class="icon">📖</span>
                    <span>SEJARAH</span>
                    <span class="toggle-icon">▼</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('sejarah.edit-view') }}">SEJARAH KAYUTANGAN</a></li>
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
                    <li><a href="{{ route('admin.event.index') }}" class="active">EVENT</a></li>
                    <li><a href="{{ route('admin.news.index') }}">NEWS</a></li>
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
            <h1>KELOLA EVENT</h1>
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

        <!-- Grid Event -->
        <div class="bangunan-grid">
            @forelse ($events as $item)
                <div class="building-card">
                    <div class="building-image">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                        @else
                            <img src="{{ asset('images/placeholder.png') }}" alt="{{ $item->judul }}">
                        @endif
                    </div>
                    <div class="building-content">
                        <h3 class="building-title">{{ $item->judul }}</h3>
                        <p class="building-description">{{ Str::limit($item->ringkasan, 100) }}</p>
                        <div class="button-group">
                            <button type="button" class="btn-edit" data-id="{{ $item->id }}" onclick="editEvent(this.dataset.id)">UBAH</button>
                            <button type="button" class="btn-delete" data-id="{{ $item->id }}" onclick="deleteEvent(this.dataset.id)" title="Hapus">🗑️</button>
                        </div>
                    </div>
                </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: #999; padding: 40px;">Belum ada data event</p>
            @endforelse
        </div>

        <!-- Tombol Tambah Event -->
        <div class="add-bangunan-section">
            <button type="button" class="btn-tambah" onclick="addEvent()">TAMBAH EVENT</button>
        </div>
    </div>
</div>

<!-- Modal Edit Event -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <h2>Edit Event</h2>

        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Judul Event</label>
                <input type="text" id="editJudul" name="judul" required>
            </div>

            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" id="editTanggalMulai" name="tanggal_mulai">
            </div>

            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" id="editTanggalSelesai" name="tanggal_selesai">
            </div>

            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" id="editLokasi" name="lokasi">
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" id="photoInput" name="gambar" accept="image/*">
                <div id="photoPreview" style="display:none; margin-top: 10px;">
                    <img id="photoImg" src="" alt="Preview" style="max-width: 200px;">
                    <button type="button" onclick="removePhoto()" class="btn-remove-img">Hapus</button>
                </div>
            </div>

            <div class="form-group">
                <label>Ringkasan</label>
                <textarea id="editRingkasan" name="ringkasan" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label>Konten</label>
                <textarea id="editKonten" name="konten" rows="6"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">UPDATE</button>
                <button type="button" class="btn btn-secondary" onclick="closeModal()">BATAL</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Event -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeAddModal()">&times;</span>
        <h2>Tambah Event</h2>

        <form id="addForm" method="POST" action="{{ route('admin.event.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Judul Event</label>
                <input type="text" name="judul" required>
            </div>

            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai">
            </div>

            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai">
            </div>

            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi">
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" id="addPhotoInput" name="gambar" accept="image/*">
                <div id="addPhotoPreview" style="display:none; margin-top: 10px;">
                    <img id="addPhotoImg" src="" alt="Preview" style="max-width: 200px;">
                    <button type="button" onclick="removeAddPhoto()" class="btn-remove-img">Hapus</button>
                </div>
            </div>

            <div class="form-group">
                <label>Ringkasan</label>
                <textarea name="ringkasan" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label>Konten</label>
                <textarea name="konten" rows="6"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">TAMBAH</button>
                <button type="button" class="btn btn-secondary" onclick="closeAddModal()">BATAL</button>
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

    function editEvent(id) {
        fetch(`/admin/event/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('editJudul').value = data.judul;
                document.getElementById('editTanggalMulai').value = data.tanggal_mulai || '';
                document.getElementById('editTanggalSelesai').value = data.tanggal_selesai || '';
                document.getElementById('editLokasi').value = data.lokasi || '';
                document.getElementById('editRingkasan').value = data.ringkasan || '';
                document.getElementById('editKonten').value = data.konten || '';
                
                if (data.gambar) {
                    document.getElementById('photoImg').src = `/storage/${data.gambar}`;
                    document.getElementById('photoPreview').style.display = 'block';
                }

                document.getElementById('editForm').action = `/admin/event/${id}`;
                document.getElementById('editModal').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    }

    function addEvent() {
        document.getElementById('addForm').reset();
        document.getElementById('addPhotoPreview').style.display = 'none';
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

    function deleteEvent(id) {
        if (confirm('Apakah Anda yakin ingin menghapus event ini?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/event/${id}`;
            form.innerHTML = `@csrf @method('DELETE')`;
            document.body.appendChild(form);
            form.submit();
        }
    }

    // Photo preview handlers
    document.addEventListener('DOMContentLoaded', function() {
        const photoInput = document.getElementById('photoInput');
        if (photoInput) {
            photoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('photoImg').src = event.target.result;
                        document.getElementById('photoPreview').style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        const addPhotoInput = document.getElementById('addPhotoInput');
        if (addPhotoInput) {
            addPhotoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('addPhotoImg').src = event.target.result;
                        document.getElementById('addPhotoPreview').style.display = 'block';
                    };
                    reader.readAsDataURL(file);
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

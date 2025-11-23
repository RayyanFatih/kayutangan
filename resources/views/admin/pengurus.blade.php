@extends('layouts.admin')

@section('content')
<div class="pengurus-page-wrapper">
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
                    <li><a href="{{ route('admin.profil.edit') }}">EDIT PROFIL</a></li>
                    <li><a href="{{ route('admin.pengurus.index') }}" class="active">PENGURUS</a></li>
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

    <div class="pengurus-container">
        <div class="page-header">
            <h1>PENGURUS</h1>
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

        <!-- Grid Pengurus -->
        <div class="pengurus-grid">
            @forelse ($pengurus as $item)
                <div class="pengurus-card">
                    <div class="pengurus-image-wrapper">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}">
                        @else
                            <div class="pengurus-placeholder">📷</div>
                        @endif
                    </div>

                    <div class="pengurus-info">
                        <p class="pengurus-name">{{ $item->nama }}</p>
                        <p class="pengurus-position">{{ $item->jabatan }}</p>
                    </div>

                    <div class="pengurus-actions">
                        <button type="button" class="btn-edit" onclick="editPengurus({{ $item->id }})">UBAH</button>
                        <form action="{{ route('admin.pengurus.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pengurus ini?')">🗑️</button>
                        </form>
                    </div>
                </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: #999; padding: 40px;">Belum ada data pengurus</p>
            @endforelse
        </div>

        <!-- Tombol Tambah Pengurus -->
        <div class="add-pengurus-section">
            <button type="button" class="btn-tambah" onclick="addPengurus()">TAMBAH PENGURUS</button>
        </div>
    </div>
</div>

<!-- Modal Edit Pengurus -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <h2>Edit Pengurus</h2>

        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Foto Pengurus</label>
                <div class="file-input-wrapper">
                    <div id="photoPreview" class="image-preview-box" style="display: none;">
                        <img id="previewImg" src="" alt="Preview">
                        <button type="button" class="btn-remove-img" onclick="removePhoto()">✕ Hapus Foto</button>
                    </div>
                    <input type="file" id="photoInput" name="foto" accept="image/*" class="file-input">
                    <label for="photoInput" class="file-input-label">Choose image...</label>
                </div>
                <small>Format: JPG, PNG, GIF. Ukuran maksimal: 2MB</small>
            </div>

            <div class="form-group">
                <label for="nama">Nama Pengurus</label>
                <input type="text" id="nama" name="nama" required placeholder="Masukkan nama pengurus...">
            </div>

            <div class="form-group">
                <label for="posisi">Jabatan</label>
                <input type="text" id="posisi" name="jabatan" required placeholder="Masukkan jabatan pengurus...">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">SIMPAN</button>
                <button type="button" class="btn-cancel" onclick="closeModal()">BATAL</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Pengurus -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeAddModal()">&times;</span>
        <h2>Tambah Pengurus</h2>

        <form id="addForm" method="POST" action="{{ route('admin.pengurus.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Foto Pengurus</label>
                <div class="file-input-wrapper">
                    <div id="addPhotoPreview" class="image-preview-box" style="display: none;">
                        <img id="addPreviewImg" src="" alt="Preview">
                        <button type="button" class="btn-remove-img" onclick="removeAddPhoto()">✕ Hapus Foto</button>
                    </div>
                    <input type="file" id="addPhotoInput" name="foto" accept="image/*" class="file-input">
                    <label for="addPhotoInput" class="file-input-label">Choose image...</label>
                </div>
                <small>Format: JPG, PNG, GIF. Ukuran maksimal: 2MB</small>
            </div>

            <div class="form-group">
                <label for="addNama">Nama Pengurus</label>
                <input type="text" id="addNama" name="nama" required placeholder="Masukkan nama pengurus...">
            </div>

            <div class="form-group">
                <label for="addPosisi">Jabatan</label>
                <input type="text" id="addPosisi" name="jabatan" required placeholder="Masukkan jabatan pengurus...">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">SIMPAN</button>
                <button type="button" class="btn-cancel" onclick="closeAddModal()">BATAL</button>
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
        background-color: #f8f6f3;
    }

    .pengurus-page-wrapper {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar Styles */
    .sidebar {
        width: 200px;
        background: linear-gradient(135deg, #8B7355 0%, #6b5344 100%);
        color: white;
        position: fixed;
        height: 100vh;
        overflow-y: auto;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        z-index: 100;
        display: flex;
        flex-direction: column;
    }

    .sidebar-logo {
        padding: 20px 15px;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sidebar-logo-img {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #d4a574, #c89968);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 24px;
        color: #4f4638;
    }

    .sidebar-logo-text {
        font-size: 12px;
        font-weight: 600;
        text-align: left;
        line-height: 1.3;
    }

    .sidebar-menu {
        list-style: none;
        flex: 1;
        padding: 20px 0;
    }

    .sidebar-menu li {
        position: relative;
    }

    .sidebar-menu a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 15px;
        color: white;
        text-decoration: none;
        font-size: 12px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .sidebar-menu a:hover {
        background: rgba(255, 255, 255, 0.1);
        padding-left: 20px;
    }

    .sidebar-menu a.active {
        background: rgba(212, 165, 116, 0.3);
        border-left: 3px solid #d4a574;
        padding-left: 12px;
    }

    .sidebar-menu .icon {
        font-size: 16px;
        min-width: 20px;
    }

    .toggle-icon {
        margin-left: auto;
        font-size: 10px;
        transition: transform 0.3s ease;
    }

    .submenu {
        display: none;
        list-style: none;
        background: rgba(0, 0, 0, 0.2);
        padding: 0;
    }

    .submenu.active {
        display: block;
    }

    .submenu li a {
        padding-left: 40px;
        font-size: 11px;
        background: rgba(0, 0, 0, 0.1);
    }

    .sidebar-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        padding: 15px 0;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .sidebar-bottom a {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 15px;
        color: white;
        text-decoration: none;
        font-size: 11px;
        transition: all 0.3s ease;
    }

    .sidebar-bottom a:hover {
        background: rgba(255, 255, 255, 0.1);
        padding-left: 20px;
    }

    /* Main Content */
    .pengurus-container {
        margin-left: 200px;
        flex: 1;
        padding: 40px 80px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #f8f6f3;
    }

    .page-header {
        text-align: center;
        margin-bottom: 40px;
        width: 100%;
    }

    .page-header h1 {
        color: #4f4638;
        font-size: 36px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
        border-left: 4px solid;
        width: 100%;
        max-width: 900px;
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

    /* Grid Pengurus */
    .pengurus-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        width: 100%;
        max-width: 900px;
        margin-bottom: 40px;
    }

    .pengurus-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .pengurus-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    }

    .pengurus-image-wrapper {
        width: 100%;
        height: 200px;
        background: #f0f0f0;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pengurus-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .pengurus-placeholder {
        font-size: 60px;
        color: #ccc;
    }

    .pengurus-info {
        padding: 20px;
        text-align: center;
        flex: 1;
    }

    .pengurus-name {
        font-size: 16px;
        font-weight: 600;
        color: #4f4638;
        margin-bottom: 5px;
    }

    .pengurus-position {
        font-size: 13px;
        color: #666;
    }

    .pengurus-actions {
        display: flex;
        gap: 10px;
        padding: 15px 20px;
        justify-content: center;
        border-top: 1px solid #eee;
    }

    .btn-edit,
    .btn-delete {
        padding: 10px 25px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-weight: 600;
        font-size: 12px;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background: linear-gradient(135deg, #d4a574, #c89968);
        color: #4f4638;
        flex: 1;
    }

    .btn-edit:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(212, 165, 116, 0.3);
    }

    .btn-delete {
        background: #e8e8e8;
        color: #666;
        font-size: 14px;
        padding: 10px 15px;
    }

    .btn-delete:hover {
        background: #ff6b6b;
        color: white;
    }

    /* Add Pengurus Section */
    .add-pengurus-section {
        text-align: center;
        width: 100%;
        margin-bottom: 20px;
    }

    .btn-tambah {
        background: linear-gradient(135deg, #d4a574, #c89968);
        color: #4f4638;
        padding: 12px 50px;
        border: none;
        border-radius: 30px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-tambah:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(212, 165, 116, 0.3);
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .modal-content {
        background-color: white;
        margin: 5% auto;
        padding: 40px;
        border: 1px solid #ddd;
        border-radius: 10px;
        width: 90%;
        max-width: 500px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .modal-close:hover {
        color: #000;
    }

    .modal-content h2 {
        color: #4f4638;
        margin-bottom: 20px;
        font-size: 22px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #4f4638;
        margin-bottom: 8px;
    }

    .form-group input[type="text"] {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
    }

    .form-group input[type="text"]:focus {
        outline: none;
        border-color: #d4a574;
        box-shadow: 0 0 5px rgba(212, 165, 116, 0.3);
    }

    .file-input-wrapper {
        margin-bottom: 10px;
    }

    .file-input {
        display: none;
    }

    .file-input-label {
        display: block;
        padding: 15px;
        background-color: #f5f5f5;
        border: 1px dashed #ddd;
        border-radius: 6px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
        color: #666;
    }

    .file-input-label:hover {
        background-color: #eeeeee;
        border-color: #d4a574;
    }

    .image-preview-box {
        position: relative;
        margin-bottom: 15px;
        border-radius: 6px;
        overflow: hidden;
    }

    .image-preview-box img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .btn-remove-img {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ff6b6b;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 600;
    }

    .btn-remove-img:hover {
        background: #ff5252;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 30px;
    }

    .btn-submit,
    .btn-cancel {
        flex: 1;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-submit {
        background: linear-gradient(135deg, #d4a574, #c89968);
        color: #4f4638;
    }

    .btn-submit:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 10px rgba(212, 165, 116, 0.3);
    }

    .btn-cancel {
        background: #e8e8e8;
        color: #666;
    }

    .btn-cancel:hover {
        background: #ddd;
    }

    small {
        display: block;
        font-size: 12px;
        color: #999;
        margin-top: 5px;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .pengurus-container {
            padding: 30px 50px;
        }

        .pengurus-grid {
            gap: 20px;
        }
    }

    @media (max-width: 768px) {
        .pengurus-page-wrapper {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
            flex-direction: row;
            align-items: center;
        }

        .sidebar-menu {
            display: none;
            flex-direction: row;
            padding: 10px 0;
        }

        .pengurus-container {
            margin-left: 0;
            padding: 20px 15px;
        }

        .page-header h1 {
            font-size: 24px;
        }

        .pengurus-grid {
            grid-template-columns: 1fr;
        }

        .modal-content {
            width: 95%;
            padding: 25px;
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

    function editPengurus(id) {
        // Get pengurus data via AJAX
        fetch(`/admin/pengurus/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('nama').value = data.nama;
                document.getElementById('posisi').value = data.jabatan;

                if (data.foto) {
                    document.getElementById('previewImg').src = `/storage/${data.foto}`;
                    document.getElementById('photoPreview').style.display = 'block';
                } else {
                    document.getElementById('photoPreview').style.display = 'none';
                }

                document.getElementById('editForm').action = `/admin/pengurus/${id}`;
                document.getElementById('editModal').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    }

    function addPengurus() {
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

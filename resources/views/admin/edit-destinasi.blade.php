<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - Destinasi Wisata</title>
    <link rel="stylesheet" href="{{ asset('css-admin/edit-destinasi.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="destinasi-page-wrapper">
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
                    <a href="{{ route('admin.edit-destinasi') }}" class="active">
                        <span class="icon">🏖️</span>
                        <span>DESTINASI</span> 
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-toggle" onclick="toggleSubmenu(event, 2)">
                        <span class="icon">📸</span>
                        <span>EVENT & NEWS</span>
                        <span class="toggle-icon">▼</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.event.index') }}">EVENT</a></li>
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

        <!-- Main Content -->
        <div class="destinasi-container">
            <!-- Page Header -->
            <div class="page-header">
                <h1>DESTINASI WISATA</h1>
            </div>

            <!-- Alert Messages -->
            <div id="alertContainer" style="width: 100%; max-width: 900px;"></div>

            <!-- Add Destinasi Button -->
            <div class="add-destinasi-section">
                <button class="btn-tambah" onclick="showAddForm()">✨ TAMBAH DESTINASI</button>
            </div>

            <!-- List View -->
            <div id="listView" class="destinasi-grid" style="width: 100%; max-width: 1200px;">
                <!-- Cards akan ditampilkan di sini -->
            </div>
        </div>
    </div>

<!-- Image Modal -->
<div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-2xl max-h-[80vh] overflow-auto">
        <button onclick="closeImageModal()" class="float-right text-2xl font-bold text-gray-600 hover:text-red-800">
            ✕
        </button>
        <img id="modalImage" src="" alt="" class="w-full h-auto rounded-lg">
        <p id="modalTitle" class="text-center mt-4 font-semibold text-gray-800"></p>
    </div>
</div>

<!-- Form Modal -->
<div id="formModal" class="modal">
    <div class="modal-content" style="max-width: 600px;">
        <span class="modal-close" onclick="closeFormModal()">&times;</span>
        <h2 id="formTitle" style="margin-bottom: 25px;">Tambah Destinasi Wisata</h2>
        
        <form id="destinasiForm" class="destinasi-form">
            <input type="hidden" id="destinasiId" value="">

            <div class="form-group">
                <label for="gambar">Gambar <span id="gambarRequired" style="color: red;">*</span></label>
                <input type="file" id="gambar" name="gambar" class="form-control-file" accept="image/*" onchange="previewImage(event)">
                <div id="imagePreview" class="image-preview-box" style="margin-top: 15px;"></div>
                <small style="display: block; margin-top: 8px;">Format: JPEG, PNG, JPG, GIF. Ukuran maksimal: 10MB</small>
            </input>

            <div class="form-group">
                <label for="nama">Nama Destinasi <span style="color: red;">*</span></label>
                <input type="text" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label>Kategori <span style="color: red;">*</span></label>
                <select id="kategori" name="kategori" required style="width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: inherit; transition: all 0.3s ease; cursor: pointer;">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="tempat nongkrong">☕ Tempat Nongkrong</option>
                    <option value="kuliner">🍽️ Kuliner</option>
                    <option value="tempat wisata">🏛️ Tempat Wisata</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jam_buka_tutup">Jam Buka-Tutup</label>
                <input type="text" id="jam_buka_tutup" name="jam_buka_tutup" placeholder="Contoh: 08:00 - 22:00">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi <span style="color: red;">*</span></label>
                <textarea id="deskripsi" name="deskripsi" required placeholder="Deskripsi singkat dan alamat tempat..."></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">💾 Simpan</button>
                <button type="button" class="btn-cancel" onclick="closeFormModal()">❌ Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Get CSRF token
    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || document.querySelector('input[name="_token"]')?.value;

    // Show Add Form Modal
    function showAddForm() {
        document.getElementById('formModal').style.display = 'block';
        document.getElementById('formTitle').textContent = 'Tambah Destinasi Baru';
        document.getElementById('destinasiForm').method = 'POST';
        document.querySelector('#destinasiForm [name="_method"]')?.remove();
        resetForm();
    }

    // Show Edit Form Modal
    function showEditForm(id) {
        // Fetch data
        fetch(`/admin/api/destinasi/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('formModal').style.display = 'block';
                document.getElementById('formTitle').textContent = 'Edit Destinasi';
                document.getElementById('destinasiId').value = id;

                // Add PUT method
                let methodInput = document.querySelector('#destinasiForm [name="_method"]');
                if (!methodInput) {
                    methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'PUT';
                    document.getElementById('destinasiForm').appendChild(methodInput);
                } else {
                    methodInput.value = 'PUT';
                }

                // Populate form
                document.getElementById('nama').value = data.nama;
                document.getElementById('kategori').value = data.kategori;
                document.getElementById('deskripsi').value = data.deskripsi;
                document.getElementById('jam_buka_tutup').value = data.jam_buka_tutup || '';

                // Show current image
                if (data.gambar) {
                    document.getElementById('imagePreview').innerHTML = `<img src="/storage/${data.gambar}" style="max-width: 100%; height: auto; border-radius: 6px; border: 1px solid #ddd;">`;
                    document.getElementById('gambarRequired').textContent = '';
                } else {
                    document.getElementById('imagePreview').innerHTML = '';
                    document.getElementById('gambarRequired').textContent = '*';
                }
                document.getElementById('gambar').value = '';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error loading destinasi data');
            });
    }

    // Close Form Modal
    function closeFormModal() {
        document.getElementById('formModal').style.display = 'none';
        resetForm();
    }

    // Reset Form
    function resetForm() {
        document.getElementById('destinasiForm').reset();
        document.getElementById('imagePreview').innerHTML = '';
        document.getElementById('gambarRequired').textContent = '*';
        document.getElementById('destinasiId').value = '';
    }

    // Preview Image
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = `<img src="${e.target.result}" style="max-width: 100%; height: auto; border-radius: 6px; border: 1px solid #ddd;">`;
            };
            reader.readAsDataURL(file);
        }
    }

    // Delete Destinasi
    function deleteDestinasi(id) {
        if (!confirm('Yakin ingin menghapus destinasi ini?')) return;

        fetch(`/admin/api/destinasi/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Destinasi berhasil dihapus');
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error menghapus destinasi');
        });
    }

    // Form Submit
    document.getElementById('destinasiForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const id = document.getElementById('destinasiId').value;
        const method = id ? 'PUT' : 'POST';
        const url = id ? `/admin/api/destinasi/${id}` : '/admin/api/destinasi';

        fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                closeFormModal();
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error saving destinasi');
        });
    });

    // Image Modal
    function openImageModal(src, name) {
        document.getElementById('imageModal').style.display = 'block';
        document.getElementById('modalImage').src = src;
        document.getElementById('modalTitle').textContent = name;
    }

    function closeImageModal() {
        document.getElementById('imageModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const formModal = document.getElementById('formModal');
        const imageModal = document.getElementById('imageModal');
        if (event.target == formModal) {
            formModal.style.display = 'none';
        }
        if (event.target == imageModal) {
            imageModal.style.display = 'none';
        }
    }

    // Load and display destinasi on page load
    document.addEventListener('DOMContentLoaded', function() {
        const destinasiData = document.querySelector('script[data-destinasi]');
        if (destinasiData) {
            try {
                const destinasi = JSON.parse(destinasiData.getAttribute('data-destinasi'));
                if (destinasi && destinasi.length > 0) {
                    displayDestinasi(destinasi);
                } else {
                    loadDestinasiFromServer();
                }
            } catch (e) {
                loadDestinasiFromServer();
            }
        } else {
            loadDestinasiFromServer();
        }
    });

    // Load destinasi from server
    function loadDestinasiFromServer() {
        fetch('/admin/api/destinasi')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displayDestinasi(data.data || []);
                }
            })
            .catch(error => console.error('Error loading destinasi:', error));
    }

    // Display destinasi cards
    function displayDestinasi(destinasiList) {
        const grid = document.getElementById('listView');
        
        if (!destinasiList || destinasiList.length === 0) {
            grid.innerHTML = '<div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #999;">Belum ada destinasi. Silakan tambahkan destinasi baru.</div>';
            return;
        }

        grid.innerHTML = destinasiList.map(item => `
            <div class="destinasi-card">
                <div class="destinasi-image-wrapper">
                    ${item.gambar ? `<img src="/storage/${item.gambar}" alt="${item.nama}" onclick="openImageModal('/storage/${item.gambar}', '${item.nama}')">` : '<span class="destinasi-placeholder">🖼️</span>'}
                </div>
                <div class="destinasi-info">
                    <div class="destinasi-name">${item.nama}</div>
                    <div class="destinasi-category">
                        <span class="category-badge">${getCategoryEmoji(item.kategori)} ${item.kategori}</span>
                    </div>
                </div>
                <div class="destinasi-actions">
                    <button class="btn-edit" onclick="showEditForm(${item.id})">✏️ Edit</button>
                    <button class="btn-delete" onclick="deleteDestinasi(${item.id})">🗑️</button>
                </div>
            </div>
        `).join('');
    }

    // Get category emoji
    function getCategoryEmoji(kategori) {
        const emojis = {
            'tempat nongkrong': '☕',
            'kuliner': '🍽️',
            'tempat wisata': '🏛️'
        };
        return emojis[kategori] || '🏷️';
    }

    // Toggle submenu dengan index
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

    // Smooth scroll for sidebar links
    document.querySelectorAll('.sidebar-menu a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            if (!this.classList.contains('menu-toggle')) {
                document.querySelectorAll('.sidebar-menu a').forEach(a => a.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });
</script>

<script data-destinasi="{{ json_encode($destinasi ?? []) }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Kayutangan Heritage</title>
    <link rel="stylesheet" href="{{ asset('css-admin/beranda.css') }}">
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                <div class="sidebar-logo-img">KH</div>
                <div class="sidebar-logo-text">Kayutangan<br>Heritage</div>
            </div>

            <ul class="sidebar-menu">
                <li>
                    <a href="#beranda" class="active">
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

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <div class="header">
                <div class="header-left">
                    <h1 class="header-title">BERANDA</h1>
                    <div class="search-box">
                        <input type="text" placeholder="Cari...">
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-icon">⚙️</div>
                    <div class="header-icon">🔔</div>
                    <div class="user-profile">A</div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-card-header">
                        <div class="stat-card-title">Jumlah Pengunjung</div>
                        <div class="stat-filter-buttons">
                            <button class="filter-btn active" onclick="changeFilter('daily', this)">Harian</button>
                            <button class="filter-btn" onclick="changeFilter('weekly', this)">Mingguan</button>
                            <button class="filter-btn" onclick="changeFilter('monthly', this)">Bulanan</button>
                        </div>
                    </div>
                    <div class="visitor-content">
                        <div id="daily-content" class="filter-content active">
                            <div class="stat-card-number">125</div>
                            <div class="stat-card-subtext">Hari Ini - 20 November 2025</div>
                            <div class="date-selector">
                                <input type="date" id="daily-date" value="2025-11-20" onchange="changeDailyDate(this.value)">
                            </div>
                        </div>
                        
                        <div id="weekly-content" class="filter-content">
                            <div class="stat-card-number">856</div>
                            <div class="stat-card-subtext">Minggu Ini - 17-23 Nov 2025</div>
                            <div class="week-selector">
                                <button class="week-btn" onclick="changeWeek(-1)">‹ Minggu Sebelumnya</button>
                                <button class="week-btn" onclick="changeWeek(1)">Minggu Berikutnya ›</button>
                            </div>
                        </div>
                        
                        <div id="monthly-content" class="filter-content">
                            <div class="stat-card-number">2350</div>
                            <div class="stat-card-subtext" id="visitor-month">November 2025</div>
                            <select id="month-select" class="month-select" onchange="changeMonth(this.value)">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-title">Jumlah Galeri Upload</div>
                    <div class="stat-card-number">34</div>
                </div>

                <div class="stat-card">
                    <div class="stat-card-title">Jumlah Admin Login</div>
                    <div class="stat-card-number">5</div>
                </div>
            </div>

            <!-- KELOLA BANNER -->
            <div class="section">
                <h2 class="section-title">Kelola Banner</h2>
                <div class="form-group">
                    <label>Gambar</label>
                    <div class="file-upload">
                        <input type="file" id="banner-upload" accept="image/*">
                        <label for="banner-upload" class="file-upload-label">Choose image...</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea placeholder="Masukkan deskripsi banner..."></textarea>
                </div>
                <button class="btn-update">UPDATE</button>
            </div>

            <!-- KELOLA SEJARAH -->
            <div class="section">
                <h2 class="section-title">Kelola Sejarah</h2>
                <div class="form-group">
                    <label>Gambar</label>
                    <div class="file-upload">
                        <input type="file" id="sejarah-upload" accept="image/*">
                        <label for="sejarah-upload" class="file-upload-label">Choose image...</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea placeholder="Masukkan deskripsi sejarah..."></textarea>
                </div>
                <button class="btn-update">UPDATE</button>
            </div>

            <!-- KELOLA PROFIL -->
            <div class="section">
                <h2 class="section-title">Kelola Profil</h2>
                <div class="form-group">
                    <label>Gambar</label>
                    <div class="file-upload">
                        <input type="file" id="profil-upload" accept="image/*">
                        <label for="profil-upload" class="file-upload-label">Choose image...</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea placeholder="Masukkan deskripsi profil..."></textarea>
                </div>
                <button class="btn-update">UPDATE</button>
            </div>

            <!-- KELOLA DESTINASI -->
            <div class="section">
                <h2 class="section-title">Kelola Destinasi</h2>
                <div class="form-group">
                    <label>Gambar</label>
                    <div class="file-upload">
                        <input type="file" id="destinasi-upload" accept="image/*">
                        <label for="destinasi-upload" class="file-upload-label">Choose image...</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea placeholder="Masukkan deskripsi destinasi..."></textarea>
                </div>
                <button class="btn-update">UPDATE</button>
            </div>

            <!-- KELOLA GALERI -->
            <div class="section">
                <h2 class="section-title">Kelola Galeri</h2>
                <div class="form-group">
                    <label>Gambar</label>
                    <div class="file-upload">
                        <input type="file" id="galeri-upload" accept="image/*">
                        <label for="galeri-upload" class="file-upload-label">Choose image...</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea placeholder="Masukkan deskripsi galeri..."></textarea>
                </div>
                <button class="btn-update">UPDATE</button>
            </div>

            <!-- KELOLA EVENT & NEWS -->
            <div class="section">
                <h2 class="section-title">Kelola Event & News</h2>
                
                <div style="margin-bottom: 25px;">
                    <h3 style="font-size: 14px; margin-bottom: 15px; font-weight: 600;">Gambar 1</h3>
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="file-upload">
                            <input type="file" id="event-1-upload" accept="image/*">
                            <label for="event-1-upload" class="file-upload-label">Choose image...</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea placeholder="Masukkan deskripsi event..."></textarea>
                    </div>
                </div>

                <div style="margin-bottom: 25px;">
                    <h3 style="font-size: 14px; margin-bottom: 15px; font-weight: 600;">Gambar 2</h3>
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="file-upload">
                            <input type="file" id="event-2-upload" accept="image/*">
                            <label for="event-2-upload" class="file-upload-label">Choose image...</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea placeholder="Masukkan deskripsi event..."></textarea>
                    </div>
                </div>

                <div style="margin-bottom: 25px;">
                    <h3 style="font-size: 14px; margin-bottom: 15px; font-weight: 600;">Gambar 3</h3>
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="file-upload">
                            <input type="file" id="event-3-upload" accept="image/*">
                            <label for="event-3-upload" class="file-upload-label">Choose image...</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea placeholder="Masukkan deskripsi event..."></textarea>
                    </div>
                </div>

                <div style="margin-bottom: 25px;">
                    <h3 style="font-size: 14px; margin-bottom: 15px; font-weight: 600;">Gambar 4</h3>
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="file-upload">
                            <input type="file" id="event-4-upload" accept="image/*">
                            <label for="event-4-upload" class="file-upload-label">Choose image...</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea placeholder="Masukkan deskripsi event..."></textarea>
                    </div>
                </div>

                <div style="margin-bottom: 25px;">
                    <h3 style="font-size: 14px; margin-bottom: 15px; font-weight: 600;">Gambar 5</h3>
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="file-upload">
                            <input type="file" id="event-5-upload" accept="image/*">
                            <label for="event-5-upload" class="file-upload-label">Choose image...</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea placeholder="Masukkan deskripsi event..."></textarea>
                    </div>
                </div>

                <button class="btn-update">UPDATE</button>
            </div>
        </main>
    </div>

    <script>
        // Data pengunjung harian (contoh)
        const dailyVisitorData = {
            '2025-11-20': 125,
            '2025-11-19': 142,
            '2025-11-18': 118,
            '2025-11-17': 156,
            '2025-11-16': 135
        };

        // Data pengunjung mingguan (contoh)
        const weeklyVisitorData = {
            'week-0': { count: 856, range: '17-23 Nov 2025' },
            'week-1': { count: 945, range: '24-30 Nov 2025' },
            'week--1': { count: 723, range: '10-16 Nov 2025' }
        };

        // Data pengunjung per bulan
        const visitorDataByMonth = {
            '01': { count: 1850, month: 'Januari' },
            '02': { count: 2100, month: 'Februari' },
            '03': { count: 1950, month: 'Maret' },
            '04': { count: 2350, month: 'April' },
            '05': { count: 2150, month: 'Mei' },
            '06': { count: 2400, month: 'Juni' },
            '07': { count: 2800, month: 'Juli' },
            '08': { count: 2650, month: 'Agustus' },
            '09': { count: 2200, month: 'September' },
            '10': { count: 2500, month: 'Oktober' },
            '11': { count: 2350, month: 'November' },
            '12': { count: 2750, month: 'Desember' }
        };

        let currentWeekOffset = 0;

        // Set default
        document.addEventListener('DOMContentLoaded', function() {
            const currentMonth = new Date().getMonth() + 1;
            const monthString = String(currentMonth).padStart(2, '0');
            document.getElementById('month-select').value = monthString;
        });

        // Change filter
        function changeFilter(filterType, button) {
            // Update button active state
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            button.classList.add('active');

            // Hide all content
            document.querySelectorAll('.filter-content').forEach(content => {
                content.classList.remove('active');
            });

            // Show selected content
            document.getElementById(filterType + '-content').classList.add('active');
        }

        // Change daily date
        function changeDailyDate(dateValue) {
            const count = dailyVisitorData[dateValue] || Math.floor(Math.random() * 100) + 100;
            const dateObj = new Date(dateValue);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateStr = dateObj.toLocaleDateString('id-ID', options);
            
            animateNumberChange(count, 'Hari ini - ' + dateStr);
        }

        // Change week
        function changeWeek(direction) {
            currentWeekOffset += direction;
            const weekKey = 'week-' + currentWeekOffset;
            const data = weeklyVisitorData[weekKey] || {
                count: Math.floor(Math.random() * 300) + 700,
                range: 'Minggu ke-' + (currentWeekOffset + 1)
            };

            animateNumberChange(data.count, 'Minggu ini - ' + data.range);
        }

        // Change month
        function changeMonth(monthValue) {
            const data = visitorDataByMonth[monthValue];
            
            animateNumberChange(data.count, data.month + ' 2025');
        }

        // Animate number change
        function animateNumberChange(count, label) {
            const contentArea = document.querySelector('.filter-content.active');
            const numberElement = contentArea.querySelector('.stat-card-number');
            const labelElement = contentArea.querySelector('.stat-card-subtext');

            numberElement.style.opacity = '0.5';
            setTimeout(() => {
                numberElement.textContent = count;
                labelElement.textContent = label;
                numberElement.style.opacity = '1';
            }, 150);
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

        // File upload preview
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function() {
                const label = this.nextElementSibling;
                if (this.files && this.files[0]) {
                    label.textContent = this.files[0].name;
                }
            });
        });

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
</body>
</html>

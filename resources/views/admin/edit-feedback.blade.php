@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset('css-admin/edit-feedback.css') }}">

@section('content')
<div class="feedback-page-wrapper">
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
                <a href="{{ route('admin.feedback.index') }}" class="active">
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

    <div class="feedback-container">
        <div class="page-header">
            <h1>FEEBACK PENGUNJUNG</h1>
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

        <!-- Feedback Table -->
        <div class="feedback-table-wrapper">
            <table class="feedback-table">
                <thead>
                    <tr>
                        <th class="col-nama">NAMA</th>
                        <th class="col-nomor">NOMOR</th>
                        <th class="col-email">EMAIL</th>
                        <th class="col-kategori">KATEGORI</th>
                        <th class="col-feedback">FEEDBACK</th>
                        <th class="col-actions">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($feedbacks as $feedback)
                        <tr>
                            <td class="col-nama">{{ $feedback->nama }}</td>
                            <td class="col-nomor">{{ $feedback->nomor }}</td>
                            <td class="col-email">{{ $feedback->email }}</td>
                            <td class="col-kategori">{{ $feedback->kategori }}</td>
                            <td class="col-feedback" title="{{ $feedback->pesan }}">{{ $feedback->pesan }}</td>
                            <td class="col-actions">
                                <div class="action-buttons">
                                    <form action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete-feedback" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus feedback ini?')">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 40px; color: #999;">Belum ada feedback dari pengunjung</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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

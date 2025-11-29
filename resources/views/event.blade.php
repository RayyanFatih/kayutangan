<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $singleEvent->judul ?? 'Event' }} - Kayutangan Heritage</title>
    <link rel="stylesheet" href="{{ asset('css/acara&berita.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">BERANDA</a></li>
            <li><a href="{{ url('/profil') }}">PROFIL</a></li>
            <li><a href="{{ url('/') }}#sejarah">SEJARAH</a></li>
            <li><a href="{{ url('/event-news') }}" class="active">EVENT & NEWS</a></li>
            <li><a href="{{ url('/') }}#maps">MAPS</a></li>
            <li><a href="{{ url('/') }}#destinasi">DESTINASI</a></li>
            <li><a href="{{ url('/') }}#galeri">GALERI</a></li>
        </ul>
    </nav>

    <!-- Content Section -->
    <section class="detail-section">
        <div class="detail-container">
            <!-- Main Content -->
            <div class="main-content">
                <!-- Title -->
                <h1 class="detail-title">{{ $singleEvent->judul ?? 'Event' }}</h1>
                
                <!-- Meta Info -->
                <div class="meta-info">
                    <span class="author">{{ $singleEvent->lokasi ?? 'Lokasi' }}</span>
                    <span class="separator">—</span>
                    <span class="date">{{ $singleEvent?->tanggal_mulai?->format('d F Y') ?? 'Tanggal tidak tersedia' }}</span>
                </div>

                <!-- Share Buttons -->
                <div class="share-section">
                    <span class="share-label">Bagikan:</span>
                    <div class="share-buttons">
                        <a href="#" class="share-btn whatsapp" title="WhatsApp">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </a>
                        <a href="#" class="share-btn facebook" title="Facebook">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="share-btn instagram" title="Instagram">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="featured-image">
                    {{-- GANTI: {{ asset('storage/' . $event->image) }} --}}
                <!-- Featured Image -->
                <div class="featured-image">
                    @if($singleEvent->gambar)
                <!-- Content Body -->
                <div class="content-body">
                    <p><strong>Ringkasan:</strong></p>
                    <p>{{ $singleEvent->ringkasan ?? 'Ringkasan tidak tersedia' }}</p>
                    
                    @if($singleEvent->konten)
                    <p><strong>Deskripsi Lengkap:</strong></p>
                    <p>{!! nl2br(e($singleEvent->konten)) !!}</p>
                    @endif
                    
                    @if($singleEvent->tanggal_mulai || $singleEvent->tanggal_selesai)
                    <p><strong>Jadwal Event:</strong></p>
                    <p>
                        Dari: {{ $singleEvent->tanggal_mulai?->format('d F Y H:i') ?? '-' }}<br>
                        Hingga: {{ $singleEvent->tanggal_selesai?->format('d F Y H:i') ?? '-' }}
                    </p>
                    @endif
                </div>>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                </div>

                <!-- Author Section -->
            <!-- Sidebar -->
            <aside class="sidebar">
                <h3 class="sidebar-title">Event Lainnya</h3>
                <div class="sidebar-list">
                    {{-- LOOP EVENT LAINNYA --}}
                    @forelse($otherEvents as $item)
                    <div class="sidebar-item">
                        <div class="sidebar-image">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                            @else
                                <img src="{{ asset('images/placeholder.png') }}" alt="{{ $item->judul }}">
                            @endif
                        </div>
                        <div class="sidebar-content">
                            <h4><a href="{{ route('event.detail', ['id' => $item->id]) }}" style="text-decoration: none; color: inherit;">{{ Str::limit($item->judul, 50) }}</a></h4>
                            <p class="sidebar-date">{{ $item->tanggal_mulai->format('d F Y') }}</p>
                        </div>
                    </div>
                    @empty
                    <p style="text-align: center; color: #999;">Tidak ada event lainnya</p>
                    @endforelse
                </div>
            </aside>        <p class="sidebar-date">Tanggal berita dibuat</p>
                        </div>
                    </div>

                    {{-- @endforeach --}}
                </div>
            </aside>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <!-- Logo -->
            <div class="footer-logo">
                <a href="{{ url('/profil') }}" class="footer-logo-circle">
                    <img src="{{ asset('images/logo-kayutangan.png') }}" alt="Logo Kayutangan Heritage">
                </a>
                <div class="footer-menu-mobile">
                    <h4>Menu</h4>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/') }}#destinasi">Destinasi Wisata</a></li>
                        <li><a href="{{ url('/') }}#galeri">Galeri</a></li>
                        <li><a href="#feedback">Feedback</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Kontak & Social Media & Alamat -->
            <div class="footer-right">
                <div class="footer-row">
                    <!-- Kontak -->
                    <div class="footer-contact">
                        <h4>Kontak</h4>
                        <p>📞 +62 xxx xxxx xxxx<br>✉️ info@kayutangan.com</p>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="social-section">
                        <h4>Social Media</h4>
                        <div class="social-icons">
                            <a href="#" class="social-icon">📷</a>
                            <a href="#" class="social-icon">f</a>
                            <a href="#" class="social-icon">𝕏</a>
                        </div>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="address-section">
                    <h4>📍 Alamat</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>Copyright</p>
        </div>
    </footer>
</body>
</html>
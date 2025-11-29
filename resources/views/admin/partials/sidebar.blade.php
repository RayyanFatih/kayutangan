
<aside
    class="w-52 bg-gradient-to-br from-[#6b5344] to-[#8B7355] text-white py-5 shadow-xl fixed h-screen overflow-y-auto">

    <!-- Logo -->
    <div class="text-center mb-8 px-4">
        <div
            class="w-10 h-10 bg-white rounded-full flex items-center justify-center font-bold text-[#8B7355] text-xs mx-auto mb-2">
            KH
        </div>
        <div class="text-[11px] font-semibold uppercase tracking-wide leading-tight">
            Kayutangan<br>Heritage
        </div>
    </div>

    <!-- Menu -->
    <div>
        <ul class="space-y-1">

            <!-- BERANDA -->
            <li>
                <a href="{{ route('admin.beranda') }}"
                    class="flex items-center gap-2 px-4 py-3 text-[13px] text-white/85 hover:text-white hover:bg-white/10 border-l-4 border-transparent hover:border-[#d4a574] transition">
                    <i data-lucide="house" class="w-4 h-4 mr-3"></i>
                    BERANDA
                </a>
            </li>

            <!-- PROFIL -->
            <li>
                <button onclick="toggleSubmenu(event, -1)"
                    class="w-full flex items-center gap-2 px-4 py-3 text-[13px] text-white/85 hover:text-white hover:bg-white/10 border-l-4 border-transparent hover:border-[#d4a574] transition">
                    <i data-lucide="user" class="w-4 h-4 mr-3"></i>
                    PROFIL
                    <span class="ml-auto text-[10px] transition-transform">▼</span>
                </button>

                <ul class="submenu max-h-0 overflow-hidden transition-all duration-300">
                    <li>
                        <a href="{{ route('admin.profil.edit') }}"
                            class="block px-10 py-2 text-[12px] text-white/70 bg-black/10 hover:bg-black/20 hover:text-white hover:border-l-[#d4a574] border-l-4 border-transparent transition">
                            EDIT PROFIL
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.pengurus.index') }}"
                            class="block px-10 py-2 text-[12px] text-white/70 bg-black/10 hover:bg-black/20 hover:text-white hover:border-l-[#d4a574] border-l-4 border-transparent transition">
                            PENGURUS
                        </a>
                    </li>
                </ul>
            </li>

            <!-- SEJARAH -->
            <li>
                <button onclick="toggleSubmenu(event, 0)"
                    class="w-full flex items-center gap-2 px-4 py-3 text-[13px] text-white/85 hover:text-white hover:bg-white/10 border-l-4 border-transparent hover:border-[#d4a574] transition">
                    <i data-lucide="scroll" class="w-4 h-4 mr-3"></i>
                    SEJARAH
                    <span class="ml-auto text-[10px]">▼</span>
                </button>

                <ul class="submenu max-h-0 overflow-hidden transition-all duration-300">
                    <li><a href="#sejarah-kayutangan"
                            class="block px-10 py-2 text-[12px] text-white/70 bg-black/10 hover:bg-black/20 hover:text-white border-l-4 border-transparent hover:border-[#d4a574] transition">SEJARAH
                            KAYUTANGAN</a></li>
                    <li><a href="#sejarah-bangunan"
                            class="block px-10 py-2 text-[12px] text-white/70 bg-black/10 hover:bg-black/20 hover:text-white border-l-4 border-transparent hover:border-[#d4a574] transition">SEJARAH
                            BANGUNAN</a></li>
                </ul>
            </li>

            <!-- MAPS -->
            <li>
                <a href="#maps" data-lucide="maps"
                    class="flex items-center gap-2 px-4 py-3 text-[13px] text-white/85 hover:text-white hover:bg-white/10 border-l-4 border-transparent hover:border-[#d4a574] transition">
                    <i data-lucide="map" class="w-4 h-4 mr-3"></i>
                    MAPS
                </a>
            </li>

            <!-- DESTINASI -->
            <li>
                <a href="{{ route('admin.destinasi.index') }}"
                    class="flex items-center gap-2 px-4 py-3 text-[13px] text-white/85 hover:text-white hover:bg-white/10 border-l-4 border-transparent hover:border-[#d4a574] transition">
                    <i data-lucide="map-pin" class="w-4 h-4 mr-3"></i>
                    DESTINASI
                </a>
            </li>

            <!-- EVENT & NEWS -->
            <li>
                <button onclick="toggleSubmenu(event, 2)"
                    class="w-full flex items-center gap-2 px-4 py-3 text-[13px] text-white/85 hover:text-white hover:bg-white/10 border-l-4 border-transparent hover:border-[#d4a574] transition">
                    <i data-lucide="calendar-days" class="w-4 h-4 mr-3"></i>
                    EVENT & NEWS
                    <span class="ml-auto text-[10px]">▼</span>
                </button>

                <ul class="submenu max-h-0 overflow-hidden transition-all duration-300">
                    <li><a href="#event"
                            class="block px-10 py-2 text-[12px] text-white/70 bg-black/10 hover:bg-black/20 hover:text-white border-l-4 border-transparent hover:border-[#d4a574] transition">EVENT</a>
                    </li>
                    <li><a href="#news"
                            class="block px-10 py-2 text-[12px] text-white/70 bg-black/10 hover:bg-black/20 hover:text-white border-l-4 border-transparent hover:border-[#d4a574] transition">NEWS</a>
                    </li>
                </ul>
            </li>

            <!-- GALERI -->
            <li>
                <a href="#galeri"
                    class="flex items-center gap-2 px-4 py-3 text-[13px] text-white/85 hover:text-white hover:bg-white/10 border-l-4 border-transparent hover:border-[#d4a574] transition">
                    <i data-lucide="image" class="w-4 h-4 mr-3"></i>
                    GALERI
                </a>
            </li>

            <!-- FEEDBACK -->
            <li>
                <a href="#feedback"
                    class="flex items-center gap-2 px-4 py-3 text-[13px] text-white/85 hover:text-white hover:bg-white/10 border-l-4 border-transparent hover:border-[#d4a574] transition">
                    <i data-lucide="mail" class="w-4 h-4 mr-3"></i>
                    FEEDBACK
                </a>
            </li>
        </ul>
    </div>


    <!-- Bottom Menu -->
    <div class="absolute bottom-5 w-full mt-4">
        <a href="#"
            class="flex items-center gap-2 px-4 py-2 text-[11px] text-white/80 hover:text-white transition">👤
            Manajemen Admin</a>
        <a href="#"
            class="flex items-center gap-2 px-4 py-2 text-[11px] text-white/80 hover:text-white transition">⚙️
            Pengaturan Website</a>
        <a href="#"
            class="flex items-center gap-2 px-4 py-2 text-[11px] text-white/80 hover:text-white transition">🚪
            Logout</a>
    </div>

</aside>

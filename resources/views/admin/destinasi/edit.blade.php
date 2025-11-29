<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Edit Destinasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('admin.partials.sidebar')

    <main class="ml-50 flex-1 p-8 bg-[#fff7ed] min-h-screen">
        <div class="max-w-4xl mx-auto">

            <div class="mb-8">
                <h1 class="text-4xl font-bold text-[#4f4638] mb-2">Edit Destinasi Wisata</h1>
                <p class="text-gray-600">Perbarui informasi destinasi wisata</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                    <h3 class="font-bold mb-2">Error!</h3>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.destinasi.update', $destinasi) }}" method="POST"
                enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="bg-white rounded-xl shadow-lg p-8">

                    <!-- Nama -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2"> Nama Destinasi <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama', $destinasi->nama) }}" required
                            class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20 transition-all duration-300"
                            placeholder="Contoh: Candi Jago">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2"> Deskripsi <span
                                class="text-red-500">*</span></label>
                        <textarea name="deskripsi" required rows="5"
                            class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20 transition-all duration-300"
                            placeholder="Deskripsikan destinasi wisata ini...">{{ old('deskripsi', $destinasi->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-3"> Kategori <span
                                class="text-red-500">*</span></label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <label class="relative cursor-pointer">
                                <input type="radio" name="kategori" value="nongkrong" class="sr-only peer"
                                    {{ old('kategori', $destinasi->kategori) == 'nongkrong' ? 'checked' : '' }}>
                                <div
                                    class="p-4 border-2 border-gray-300 rounded-lg hover:border-[#8B7355] peer-checked:border-[#8B7355] peer-checked:bg-[#8B7355]/10 transition-all duration-300 text-center">
                                    <span class="text-3xl block mb-2">☕</span>
                                    <span class="font-semibold text-gray-700">Tempat Nongkrong</span>
                                </div>
                            </label>

                            <label class="relative cursor-pointer">
                                <input type="radio" name="kategori" value="kuliner" class="sr-only peer"
                                    {{ old('kategori', $destinasi->kategori) == 'kuliner' ? 'checked' : '' }}>
                                <div
                                    class="p-4 border-2 border-gray-300 rounded-lg hover:border-[#8B7355] peer-checked:border-[#8B7355] peer-checked:bg-[#8B7355]/10 transition-all duration-300 text-center">
                                    <span class="text-3xl block mb-2">🍽️</span>
                                    <span class="font-semibold text-gray-700">Kuliner</span>
                                </div>
                            </label>

                            <label class="relative cursor-pointer">
                                <input type="radio" name="kategori" value="wisata" class="sr-only peer"
                                    {{ old('kategori', $destinasi->kategori) == 'wisata' ? 'checked' : '' }}>
                                <div
                                    class="p-4 border-2 border-gray-300 rounded-lg hover:border-[#8B7355] peer-checked:border-[#8B7355] peer-checked:bg-[#8B7355]/10 transition-all duration-300 text-center">
                                    <span class="text-3xl block mb-2">🏛️</span>
                                    <span class="font-semibold text-gray-700">Destinasi Wisata</span>
                                </div>
                            </label>
                        </div>
                        @error('kategori')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2"> Alamat <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="alamat" value="{{ old('alamat', $destinasi->alamat) }}" required
                            class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20 transition-all duration-300"
                            placeholder="Contoh: Jl. Diponegoro, Malang">
                        @error('alamat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jam -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2"> Jam Buka - Tutup</label>
                        <input type="text" name="jam_buka_tutup"
                            value="{{ old('jam_buka_tutup', $destinasi->jam_buka_tutup) }}"
                            class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20 transition-all duration-300"
                            placeholder="Contoh: 08:00 - 17:00">
                        @error('jam_buka_tutup')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-3"> Upload Gambar (Kosongkan jika
                            tidak ingin mengubah)</label>

                        @if ($destinasi->gambar)
                            <div class="mb-4 p-4 bg-gray-50 rounded-lg border-2 border-gray-200">
                                <p class="text-sm font-semibold text-gray-700 mb-2">Gambar Saat Ini:</p>
                                <img src="{{ asset('storage/' . $destinasi->gambar) }}" alt="{{ $destinasi->nama }}"
                                    class="max-h-48 rounded-lg object-cover hover:shadow-lg transition-all cursor-pointer"
                                    onclick="openImageModal('{{ asset('storage/' . $destinasi->gambar) }}', '{{ $destinasi->nama }}')">
                            </div>
                        @endif

                        <div id="dropZone"
                            class="relative border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-[#8B7355] transition-all duration-300 cursor-pointer">
                            <input type="file" name="gambar" accept="image/*" id="gambarInput" class="hidden"
                                onchange="previewImage(event)">
                            <div id="uploadText">
                                <span class="text-4xl block mb-2">📸</span>
                                <p class="text-gray-700 font-semibold">Drag & drop gambar di sini</p>
                                <p class="text-gray-500 text-sm">atau <span
                                        class="text-[#8B7355] font-bold cursor-pointer"
                                        onclick="document.getElementById('gambarInput').click()">klik untuk
                                        memilih</span></p>
                            </div>
                            <img id="preview" class="hidden max-h-64 mx-auto mt-4 rounded-lg" alt="Preview">
                            <button type="button" id="clearBtn"
                                class="hidden mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition"
                                onclick="clearImage(event)">✕ Hapus Gambar Baru</button>
                        </div>
                        @error('gambar')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Map -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2"> Pilih Lokasi Pada Map</label>
                        <select name="map_location_id"
                            class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20 transition-all duration-300">
                            <option value="">-- Pilih Lokasi Map --</option>
                            @foreach ($mapLocations as $map)
                                <option value="{{ $map->id }}"
                                    {{ old('map_location_id', $destinasi->map_location_id) == $map->id ? 'selected' : '' }}>
                                    {{ $map->nama_lokasi ?? 'Lokasi #' . $map->id }}
                                </option>
                            @endforeach
                        </select>
                        @error('map_location_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="flex items-center justify-between gap-4">
                    <a href="{{ route('admin.destinasi.index') }}"
                        class="px-6 py-3 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 transition-all duration-300 hover:scale-105">←
                        Kembali</a>
                    <button type="submit"
                        class="px-8 py-3 bg-gradient-to-r from-[#8B7355] to-[#6b5344] text-white font-bold rounded-lg hover:shadow-lg transition-all duration-300 hover:scale-105">
                        Perbarui Destinasi</button>
                </div>
            </form>

        </div>
    </main>

    <!-- Modal Preview -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-2xl max-h-[80vh] overflow-auto">
            <button onclick="closeImageModal()"
                class="float-right text-2xl font-bold text-gray-600 hover:text-gray-800">✕</button>
            <img id="modalImage" src="" alt="" class="w-full h-auto rounded-lg">
            <p id="modalTitle" class="text-center mt-4 font-semibold text-gray-800"></p>
        </div>
    </div>

    @include('admin.partials.sidebar-script')

    <script>
        // Drag & Drop Upload
        const dropZone = document.getElementById('dropZone');
        const gambarInput = document.getElementById('gambarInput');
        const uploadText = document.getElementById('uploadText');
        const preview = document.getElementById('preview');
        const clearBtn = document.getElementById('clearBtn');

        dropZone.addEventListener('click', () => gambarInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.add('border-[#8B7355]', 'bg-[#8B7355]/5');
        });

        dropZone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.remove('border-[#8B7355]', 'bg-[#8B7355]/5');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.remove('border-[#8B7355]', 'bg-[#8B7355]/5');

            const files = e.dataTransfer.files;
            if (files.length > 0 && files[0].type.startsWith('image/')) {
                gambarInput.files = files;
                previewImage({
                    target: {
                        files: files
                    }
                });
            } else {
                alert('Mohon pilih file gambar yang valid!');
            }
        });

        function previewImage(event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    uploadText.classList.add('hidden');
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    clearBtn.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                alert('Mohon pilih file gambar yang valid!');
                gambarInput.value = '';
            }
        }

        function clearImage(event) {
            event.preventDefault();
            gambarInput.value = '';
            uploadText.classList.remove('hidden');
            preview.classList.add('hidden');
            preview.src = '';
            clearBtn.classList.add('hidden');
        }

        // Modal Preview
        function openImageModal(imageSrc, imageName = '') {
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('modalTitle').textContent = imageName;
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('modalImage').src = '';
            document.getElementById('modalTitle').textContent = '';
        }

        document.getElementById('imageModal')?.addEventListener('click', function(e) {
            if (e.target.id === 'imageModal') {
                closeImageModal();
            }
        });
    </script>

</body>
</html>

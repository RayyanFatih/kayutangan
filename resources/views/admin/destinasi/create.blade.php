<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - Tambah Destinasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Main -->
    <main class="ml-50 flex-1 p-8 bg-[#fff7ed]  min-h-screen">
        <div class="max-w-4xl mx-auto">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-[#4f4638] mb-2">Tambah Destinasi Wisata</h1>
                <p class="text-gray-600">Tambahkan destinasi wisata baru ke Kayutangan Heritage</p>
            </div>

            <!-- Notifikasi -->
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

            <!-- Form -->
            <form action="{{ route('admin.destinasi.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- Card Form -->
                <div class="bg-white rounded-xl shadow-lg p-8">

                    <!-- Nama Destinasi -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Nama Destinasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required
                            class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20 transition-all duration-300"
                            placeholder="Contoh: Candi Jago">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="deskripsi" required rows="5"
                            class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20 transition-all duration-300"
                            placeholder="Deskripsikan destinasi wisata ini...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Tempat Nongkrong -->
                            <label class="relative cursor-pointer">
                                <input type="radio" name="kategori" value="nongkrong" required class="sr-only peer"
                                    {{ old('kategori') == 'nongkrong' ? 'checked' : '' }}>
                                <div
                                    class="p-4 border-2 border-gray-300 rounded-lg hover:border-[#8B7355] peer-checked:border-[#8B7355] peer-checked:bg-[#8B7355]/10 transition-all duration-300 text-center">
                                    <span class="text-3xl block mb-2">☕</span>
                                    <span class="font-semibold text-gray-700">Tempat Nongkrong</span>
                                </div>
                            </label>

                            <!-- Kuliner -->
                            <label class="relative cursor-pointer">
                                <input type="radio" name="kategori" value="kuliner" required class="sr-only peer"
                                    {{ old('kategori') == 'kuliner' ? 'checked' : '' }}>
                                <div
                                    class="p-4 border-2 border-gray-300 rounded-lg hover:border-[#8B7355] peer-checked:border-[#8B7355] peer-checked:bg-[#8B7355]/10 transition-all duration-300 text-center">
                                    <span class="text-3xl block mb-2">🍽️</span>
                                    <span class="font-semibold text-gray-700">Kuliner</span>
                                </div>
                            </label>

                            <!-- Destinasi Wisata -->
                            <label class="relative cursor-pointer">
                                <input type="radio" name="kategori" value="wisata" required class="sr-only peer"
                                    {{ old('kategori') == 'wisata' ? 'checked' : '' }}>
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
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}" required
                            class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20 transition-all duration-300"
                            placeholder="Contoh: Jl. Diponegoro, Malang">
                        @error('alamat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jam Buka Tutup -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Jam Buka - Tutup
                        </label>
                        <input type="text" name="jam_buka_tutup" value="{{ old('jam_buka_tutup') }}"
                            class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20 transition-all duration-300"
                            placeholder="Contoh: 08:00 - 17:00">
                        @error('jam_buka_tutup')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Upload Gambar -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            Upload Gambar <span class="text-red-500">*</span>
                        </label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-[#8B7355] transition-all duration-300 cursor-pointer"
                            id="dropZone">
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
                        </div>
                        @error('gambar')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Lokasi Map -->
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Pilih Lokasi Pada Map
                        </label>
                        <select name="map_location_id"
                            class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20 transition-all duration-300">
                            <option value="">-- Pilih Lokasi Map --</option>
                            @foreach ($mapLocations as $map)
                                <option value="{{ $map->id }}"
                                    {{ old('map_location_id') == $map->id ? 'selected' : '' }}>
                                    {{ $map->nama_lokasi ?? 'Lokasi #' . $map->id }}
                                </option>
                            @endforeach
                        </select>
                        @error('map_location_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-between gap-4">
                    <a href="{{ route('admin.destinasi.index') }}"
                        class="px-6 py-3 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 transition-all duration-300 hover:scale-105">
                        ← Kembali
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-gradient-to-r from-[#8B7355] to-[#6b5344] text-white font-bold rounded-lg hover:shadow-lg transition-all duration-300 hover:scale-105">
                        Simpan Destinasi
                    </button>
                </div>
            </form>
        </div>
    </main>

    @include('admin.partials.sidebar-script')
    <script>
        const dropZone = document.getElementById('dropZone');
        const gambarInput = document.getElementById('gambarInput');
        const uploadText = document.getElementById('uploadText');
        const preview = document.getElementById('preview');

        dropZone.addEventListener('click', () => gambarInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-[#8B7355]', 'bg-[#8B7355]/5');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-[#8B7355]', 'bg-[#8B7355]/5');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-[#8B7355]', 'bg-[#8B7355]/5');

            const files = e.dataTransfer.files;
            if (files.length) {
                gambarInput.files = files;
                previewImage({
                    target: {
                        files: files
                    }
                });
            }
        });

        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    uploadText.classList.add('hidden');
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

</body>

</html>

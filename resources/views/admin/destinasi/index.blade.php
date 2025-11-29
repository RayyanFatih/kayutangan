<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - Manajemen Destinasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <main class="ml-50 p-8 bg-[#fff7ed] min-h-screen">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold text-center text-[#4f4638] mb-4">Destinasi Management</h1>
            <p class="text-gray-600 text-center mb-8">Kelola semua destinasi wisata Kayutangan Heritage</p>

            <a href="{{ route('admin.destinasi.create') }}"
                class="bg-gradient-to-r from-[#8B7355] to-[#6b5344] text-white px-8 py-3 rounded-lg font-bold hover:white transition-all duration-300 mb-8">
                + Tambah Destinasi Baru
            </a>

            <div class="w-full bg-white rounded-lg shadow-lg p-6">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-[#8B7355] text-white">
                            <th class="border p-3 text-center">Gambar</th>
                            <th class="border p-3 text-center">Nama</th>
                            <th class="border p-3 text-center">Kategori</th>
                            <th class="border p-3 text-center">Alamat</th>
                            <th class="border p-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($destinasi as $item)
                            <tr class="hover:bg-blue-50 transition">
                                {{-- Gambar --}}
                                <td class="border p-3">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                                            class="w-16 h-16 object-cover rounded-lg hover:shadow-lg transition-all duration-300 cursor-pointer"
                                            onclick="openImageModal('{{ asset('storage/' . $item->gambar) }}', '{{ $item->nama }}')">
                                    @else
                                        <div
                                            class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-xs">
                                            No Image
                                        </div>
                                    @endif
                                </td>

                                {{-- Nama --}}
                                <td class="border p-3 text-sm ">{{ $item->nama }}</td>

                                {{-- Kategori --}}
                                <td class="border p-3">
                                    <span
                                        class="bg-[#b4a48c] text-[#4f4638] px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $item->kategori }}
                                    </span>
                                </td>

                                {{-- Alamat --}}
                                <td class="border p-3 text-sm ">{{ $item->alamat }}</td>

                                {{-- Aksi --}}
                                <td class="border p-3 text-center space-x-3">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('admin.destinasi.edit', $item) }}"
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 font-semibold transition-all duration-200 text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>

                                    {{-- Tombol Delete --}}
                                    <form action="{{ route('admin.destinasi.destroy', $item) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 font-semibold transition-all duration-200 text-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border p-6 text-center text-gray-500">
                                    Belum ada destinasi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <!-- Modal untuk preview gambar -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-2xl max-h-2xl">
            <button onclick="closeImageModal()"
                class="float-right text-2xl font-bold text-gray-600 hover:text-red-800">
                ✕
            </button>
            <img id="modalImage" src="" alt="" class="w-full h-auto rounded-lg">
            <p id="modalTitle" class="text-center mt-4 font-semibold text-gray-800"></p>
        </div>
    </div>

</body>

@include('admin.partials.sidebar-script')

<script>
    function openImageModal(imageSrc, imageName) {
        document.getElementById('imageModal').classList.remove('hidden');
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('modalTitle').textContent = imageName;
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }

    // Close modal saat klik di luar gambar
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeImageModal();
        }
    });
</script>

</html>

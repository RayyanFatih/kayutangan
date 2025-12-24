<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\destinasi_wisata;
use App\Models\map_locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinasi = destinasi_wisata::all();
        return view('admin.destinasi.index', compact('destinasi'));
    }

    public function editView()
    {
        $destinasi = destinasi_wisata::all();
        return view('admin.edit-destinasi', compact('destinasi'));
    }

    public function create()
    {
        $kategori = ['tempat nongkrong', 'tempat wisata', 'kuliner'];
        return view('admin.destinasi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:tempat nongkrong,tempat wisata,kuliner',
            'alamat' => 'required|string|max:255',
            'jam_buka_tutup' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Handle upload gambar
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('destinasi', 'public');
        }

        // Create destinasi
        destinasi_wisata::create($validated);

        return redirect()->route('admin.destinasi.index')
            ->with('success', '✅ Destinasi berhasil ditambahkan!');
    }

    public function show(destinasi_wisata $destinasiWisata)
    {
        return view('admin.destinasi.show', compact('destinasiWisata'));
    }

    public function edit(destinasi_wisata $destinasi)
    {
        $kategori = ['tempat nongkrong', 'tempat wisata', 'kuliner'];
        return view('admin.destinasi.edit', compact('destinasi', 'kategori'));
    }

    public function update(Request $request, destinasi_wisata $destinasi)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:tempat nongkrong,tempat wisata,kuliner',
            'alamat' => 'required|string|max:255',
            'jam_buka_tutup' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Handle new uploaded gambar
        if ($request->hasFile('gambar')) {
            // delete old file if exists
            if ($destinasi->gambar && Storage::disk('public')->exists($destinasi->gambar)) {
                Storage::disk('public')->delete($destinasi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('destinasi', 'public');
        }

        $destinasi->update($validated);

        return redirect()->route('admin.destinasi.index')
            ->with('success', '✅ Destinasi berhasil diperbarui!');
    }

public function destroy(destinasi_wisata $destinasi)
{
    try {
        // Hapus gambar dari storage jika ada
        if ($destinasi->gambar && Storage::disk('public')->exists($destinasi->gambar)) {
            Storage::disk('public')->delete($destinasi->gambar);
        }

        // Hapus data dari database
        $destinasi->delete();

        return redirect()->route('admin.destinasi.index')
            ->with('success', '✅ Destinasi berhasil dihapus!');
    } catch (\Exception $e) {
        return redirect()->route('admin.destinasi.index')
            ->with('error', '❌ Gagal menghapus destinasi: ' . $e->getMessage());
    }
}

// API Methods for AJAX requests
public function getDestinasi($id)
{
    try {
        $destinasi = destinasi_wisata::findOrFail($id);
        return response()->json([
            'id' => $destinasi->id,
            'nama' => $destinasi->nama,
            'deskripsi' => $destinasi->deskripsi,
            'kategori' => $destinasi->kategori,
            'alamat' => $destinasi->alamat,
            'jam_buka_tutup' => $destinasi->jam_buka_tutup,
            'gambar' => $destinasi->gambar,
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Destinasi tidak ditemukan'], 404);
    }
}

public function apiStore(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'kategori' => 'required|in:tempat nongkrong,tempat wisata,kuliner',
        'alamat' => 'required|string|max:255',
        'jam_buka_tutup' => 'nullable|string',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
    ]);

    try {
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('destinasi', 'public');
        }

        destinasi_wisata::create($validated);

        return response()->json([
            'success' => true,
            'message' => '✅ Destinasi berhasil ditambahkan!'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ], 500);
    }
}

public function apiUpdate(Request $request, $id)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'kategori' => 'required|in:tempat nongkrong,tempat wisata,kuliner',
        'alamat' => 'required|string|max:255',
        'jam_buka_tutup' => 'nullable|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
    ]);

    try {
        $destinasi = destinasi_wisata::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($destinasi->gambar && Storage::disk('public')->exists($destinasi->gambar)) {
                Storage::disk('public')->delete($destinasi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('destinasi', 'public');
        }

        $destinasi->update($validated);

        return response()->json([
            'success' => true,
            'message' => '✅ Destinasi berhasil diperbarui!'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ], 500);
    }
}

public function apiDestroy($id)
{
    try {
        $destinasi = destinasi_wisata::findOrFail($id);

        if ($destinasi->gambar && Storage::disk('public')->exists($destinasi->gambar)) {
            Storage::disk('public')->delete($destinasi->gambar);
        }

        $destinasi->delete();

        return response()->json([
            'success' => true,
            'message' => '✅ Destinasi berhasil dihapus!'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ], 500);
    }
}
}
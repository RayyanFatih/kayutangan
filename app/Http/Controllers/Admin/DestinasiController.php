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

    public function create()
    {
        $mapLocations = map_locations::all();
        return view('admin.destinasi.create', compact('mapLocations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:nongkrong,kuliner,wisata',
            'alamat' => 'required|string|max:255',
            'jam_buka_tutup' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'map_location_id' => 'nullable|integer|exists:map_locations,id',
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
        $mapLocations = map_locations::all();
        return view('admin.destinasi.edit', compact('destinasi', 'mapLocations'));
    }

    public function update(Request $request, destinasi_wisata $destinasi)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:nongkrong,kuliner,wisata',
            'alamat' => 'required|string|max:255',
            'jam_buka_tutup' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'map_location_id' => 'nullable|integer|exists:map_locations,id',
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
}
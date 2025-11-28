<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sejarah_bangunan;
use Illuminate\Http\Request;

class SejarahBangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = sejarah_bangunan::all();
        return view('admin.edit-bangunan', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sejarah-bangunan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bangunan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar_bangunan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'tahun_dibangun' => 'nullable|integer|min:1800|max:' . date('Y'),
            'lokasi' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar_bangunan')) {
            $validated['gambar_bangunan'] = $request->file('gambar_bangunan')->store('sejarah-bangunan', 'public');
        }

        sejarah_bangunan::create($validated);

        return redirect()->route('admin.sejarah-bangunan.index')->with('success', 'Bangunan berhasil ditambahkan');
    }

    /**
     * Show the specified resource.
     */
    public function show(sejarah_bangunan $sejarah_bangunan)
    {
        return response()->json($sejarah_bangunan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sejarah_bangunan $sejarah_bangunan)
    {
        return view('admin.sejarah-bangunan.edit', compact('sejarah_bangunan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sejarah_bangunan $sejarah_bangunan)
    {
        $validated = $request->validate([
            'nama_bangunan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar_bangunan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'tahun_dibangun' => 'nullable|integer|min:1800|max:' . date('Y'),
            'lokasi' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar_bangunan')) {
            // Delete old image if exists
            if ($sejarah_bangunan->gambar_bangunan && file_exists(storage_path('app/public/' . $sejarah_bangunan->gambar_bangunan))) {
                unlink(storage_path('app/public/' . $sejarah_bangunan->gambar_bangunan));
            }
            $validated['gambar_bangunan'] = $request->file('gambar_bangunan')->store('sejarah-bangunan', 'public');
        }

        $sejarah_bangunan->update($validated);

        return redirect()->route('admin.sejarah-bangunan.index')->with('success', 'Bangunan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sejarah_bangunan $sejarah_bangunan)
    {
        // Delete image if exists
        if ($sejarah_bangunan->gambar_bangunan && file_exists(storage_path('app/public/' . $sejarah_bangunan->gambar_bangunan))) {
            unlink(storage_path('app/public/' . $sejarah_bangunan->gambar_bangunan));
        }

        $sejarah_bangunan->delete();

        return redirect()->route('admin.sejarah-bangunan.index')->with('success', 'Bangunan berhasil dihapus');
    }
}

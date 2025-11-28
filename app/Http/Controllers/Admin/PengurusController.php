<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    /**
     * Get pengurus data (API endpoint)
     */
    public function show($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        return response()->json($pengurus);
    }

    /**
     * Display list of all pengurus
     */
    public function index()
    {
        $pengurus = Pengurus::all();
        return view('admin.pengurus', compact('pengurus'));
    }

    /**
     * Store a newly created pengurus
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'nomor' => 'nullable|string',
            'email' => 'nullable|email',
            'instagram' => 'nullable|string',
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
        ]);

        // Handle photo upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('pengurus', 'public');
            $validated['foto'] = $path;
        }

        Pengurus::create($validated);

        return redirect()->route('admin.pengurus.index')->with('success', 'Pengurus berhasil ditambahkan!');
    }

    /**
     * Update the specified pengurus
     */
    public function update(Request $request, $id)
    {
        $pengurus = Pengurus::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'nomor' => 'nullable|string',
            'email' => 'nullable|email',
            'instagram' => 'nullable|string',
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
        ]);

        // Handle photo upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pengurus->foto && Storage::exists('public/' . $pengurus->foto)) {
                Storage::delete('public/' . $pengurus->foto);
            }

            // Upload foto baru
            $file = $request->file('foto');
            $path = $file->store('pengurus', 'public');
            $validated['foto'] = $path;
        }

        $pengurus->update($validated);

        return redirect()->route('admin.pengurus.index')->with('success', 'Pengurus berhasil diperbarui!');
    }

    /**
     * Delete the specified pengurus
     */
    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);

        // Hapus foto jika ada
        if ($pengurus->foto && Storage::exists('public/' . $pengurus->foto)) {
            Storage::delete('public/' . $pengurus->foto);
        }

        $pengurus->delete();

        return redirect()->route('admin.pengurus.index')->with('success', 'Pengurus berhasil dihapus!');
    }
}

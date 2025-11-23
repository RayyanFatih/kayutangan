<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display the edit profil page
     */
    public function edit()
    {
        $profil = Profil::first() ?? new Profil();
        return view('admin.edit-profil', compact('profil'));
    }

    /**
     * Update profil data
     */
    public function update(Request $request)
    {
        $profil = Profil::first() ?? new Profil();

        // Validasi input
        $validated = $request->validate([
            'intro_text' => 'nullable|string',
            'aktivitas_kreatif_text' => 'nullable|string',
            'pejalan_kaki_text' => 'nullable|string',
            'umkm_text' => 'nullable|string',
            'wisata_text' => 'nullable|string',
            'wajah_baru_text' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'profil_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'profil_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'profil_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'aktivitas_kreatif_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pejalan_kaki_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'umkm_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ketua_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'wakil_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bendahara_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image uploads
        $imageFields = [
            'banner_image',
            'profil_image_1',
            'profil_image_2',
            'profil_image_3',
            'aktivitas_kreatif_image',
            'pejalan_kaki_image',
            'umkm_image',
            'ketua_image',
            'wakil_image',
            'bendahara_image'
        ];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Hapus gambar lama jika ada
                if ($profil->$field && Storage::exists('public/' . $profil->$field)) {
                    Storage::delete('public/' . $profil->$field);
                }
                
                // Upload gambar baru
                $file = $request->file($field);
                $path = $file->store('profil', 'public');
                $validated[$field] = $path;
            }
        }

        // Update atau create profil
        if ($profil->id) {
            $profil->update($validated);
            return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
        } else {
            Profil::create($validated);
            return redirect()->back()->with('success', 'Profil berhasil dibuat!');
        }
    }
}

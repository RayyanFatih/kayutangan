<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    /**
     * Show the form for editing sejarah.
     */
    public function edit()
    {
        $sejarah = Sejarah::first();
        
        if (!$sejarah) {
            $sejarah = Sejarah::create();
        }
        
        return view('admin.edit-sejarah', compact('sejarah'));
    }

    /**
     * Update the sejarah in storage.
     */
    public function update(Request $request)
    {
        $sejarah = Sejarah::first();
        
        if (!$sejarah) {
            $sejarah = new Sejarah();
        }

        // Validasi input
        $validated = $request->validate([
            'intro_text' => 'nullable|string',
            'masa_kolonial_title' => 'nullable|string|max:255',
            'masa_kolonial_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'masa_kolonial_text' => 'nullable|string',
            'kemerdekaan_title' => 'nullable|string|max:255',
            'kemerdekaan_text' => 'nullable|string',
            'revitalisasi_title' => 'nullable|string|max:255',
            'revitalisasi_text' => 'nullable|string',
            'menjaga_jejak_title' => 'nullable|string|max:255',
            'menjaga_jejak_text' => 'nullable|string',
        ]);

        // Handle Masa Kolonial Image
        if ($request->hasFile('masa_kolonial_image')) {
            if ($sejarah->masa_kolonial_image && Storage::disk('public')->exists($sejarah->masa_kolonial_image)) {
                Storage::disk('public')->delete($sejarah->masa_kolonial_image);
            }
            $path = $request->file('masa_kolonial_image')->store('sejarah', 'public');
            $sejarah->masa_kolonial_image = $path;
        }

        // Update text fields
        $sejarah->intro_text = $request->input('intro_text');
        $sejarah->masa_kolonial_title = $request->input('masa_kolonial_title');
        $sejarah->masa_kolonial_text = $request->input('masa_kolonial_text');
        $sejarah->kemerdekaan_title = $request->input('kemerdekaan_title');
        $sejarah->kemerdekaan_text = $request->input('kemerdekaan_text');
        $sejarah->revitalisasi_title = $request->input('revitalisasi_title');
        $sejarah->revitalisasi_text = $request->input('revitalisasi_text');
        $sejarah->menjaga_jejak_title = $request->input('menjaga_jejak_title');
        $sejarah->menjaga_jejak_text = $request->input('menjaga_jejak_text');

        $sejarah->save();

        return redirect()->back()->with('success', 'Sejarah berhasil diperbarui');
    }
}

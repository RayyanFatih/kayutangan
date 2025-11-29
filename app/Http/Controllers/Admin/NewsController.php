<?php

namespace App\Http\Controllers\Admin;

use App\Models\berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of news.
     */
    public function index()
    {
        $news = berita::all();
        return view('admin.edit-news', compact('news'));
    }

    /**
     * Store a newly created news in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'ringkasan' => 'nullable|string',
            'konten' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('news', 'public');
            $validated['gambar'] = $path;
        }

        berita::create($validated);

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified news.
     */
    public function show(berita $news)
    {
        return response()->json($news);
    }

    /**
     * Update the specified news in storage.
     */
    public function update(Request $request, berita $news)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'ringkasan' => 'nullable|string',
            'konten' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            if ($news->gambar && Storage::disk('public')->exists($news->gambar)) {
                Storage::disk('public')->delete($news->gambar);
            }
            $path = $request->file('gambar')->store('news', 'public');
            $validated['gambar'] = $path;
        }

        $news->update($validated);

        return redirect()->back()->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Remove the specified news from storage.
     */
    public function destroy(berita $news)
    {
        if ($news->gambar && Storage::disk('public')->exists($news->gambar)) {
            Storage::disk('public')->delete($news->gambar);
        }

        $news->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus');
    }
}

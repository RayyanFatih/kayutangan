<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of events.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.edit-event', compact('events'));
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'lokasi' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'konten' => 'nullable|string',
        ]);

        // Auto-generate slug dari judul
        $validated['slug'] = Str::slug($validated['judul']);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('events', 'public');
            $validated['gambar'] = $path;
        }

        Event::create($validated);

        return redirect()->back()->with('success', 'Event berhasil ditambahkan');
    }

    /**
     * Display the specified event.
     */
    public function show(Event $event)
    {
        return response()->json($event);
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'lokasi' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'konten' => 'nullable|string',
        ]);

        // Update slug jika judul berubah
        $validated['slug'] = Str::slug($validated['judul']);

        if ($request->hasFile('gambar')) {
            if ($event->gambar && Storage::disk('public')->exists($event->gambar)) {
                Storage::disk('public')->delete($event->gambar);
            }
            $path = $request->file('gambar')->store('events', 'public');
            $validated['gambar'] = $path;
        }

        $event->update($validated);

        return redirect()->back()->with('success', 'Event berhasil diperbarui');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(Event $event)
    {
        if ($event->gambar && Storage::disk('public')->exists($event->gambar)) {
            Storage::disk('public')->delete($event->gambar);
        }

        $event->delete();

        return redirect()->back()->with('success', 'Event berhasil dihapus');
    }
}

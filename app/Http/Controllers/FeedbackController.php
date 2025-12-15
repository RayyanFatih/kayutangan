<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display the feedback form
     */
    public function index()
    {
        return view('feedback');
    }

    /**
     * Store feedback in database
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nomor' => 'required|regex:/^[0-9\+\-\s\(\)]+$/|max:20',
            'email' => 'required|email|max:150',
            'kategori' => 'required|string|max:100',
            'pesan' => 'required|string|max:5000'
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal 100 karakter',
            'nomor.required' => 'Nomor HP harus diisi',
            'nomor.regex' => 'Nomor HP tidak valid',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'kategori.required' => 'Kategori harus dipilih',
            'pesan.required' => 'Pesan harus diisi',
            'pesan.max' => 'Pesan maksimal 5000 karakter'
        ]);

        try {
            // Simpan ke database
            Feedback::create($validated);

            // Return redirect dengan flash message
            return redirect()->route('feedback.index')
                ->with('success', 'Terima kasih! Feedback Anda telah dikirim dengan sukses.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors('Terjadi kesalahan saat mengirim feedback.')
                ->withInput();
        }
    }
}

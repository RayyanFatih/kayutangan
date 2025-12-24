<?php

namespace App\Http\Controllers;

use App\Models\destinasi_wisata;
use App\Models\SiteSetting;

class DestinasiController extends Controller
{
    // HALAMAN LIST
    public function index()
    {
        $destinasi = destinasi_wisata::all();

        $kategoriList = destinasi_wisata::select('kategori')
            ->distinct()
            ->pluck('kategori');

        $bgDestinasiPath = SiteSetting::where('key', 'bg_destinasi')->value('value') ?? 'images/bg.jpg';

        return view('destinasi', compact('destinasi', 'kategoriList', 'bgDestinasiPath'));
    }

    // HALAMAN DETAIL
    public function show($slug)
    {
        $destinasi = destinasi_wisata::where('slug', $slug)->firstOrFail();

        return view('user.destinasi.show', compact('destinasi'));
    }
}

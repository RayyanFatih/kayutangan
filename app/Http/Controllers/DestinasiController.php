<?php

namespace App\Http\Controllers;

use App\Models\destinasi_wisata;

class DestinasiController extends Controller
{
    // HALAMAN LIST
    public function index()
{
    $destinasi = destinasi_wisata::all();

    $kategoriList = destinasi_wisata::select('kategori')
        ->distinct()
        ->pluck('kategori');

    return view('user.destinasi.index', compact('destinasi', 'kategoriList'));
}

    // HALAMAN DETAIL
    public function show($slug)
    {
        $destinasi = destinasi_wisata::where('slug', $slug)->firstOrFail();

        return view('user.destinasi.show', compact('destinasi'));
    }
}

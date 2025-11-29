<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use App\Models\sejarah_bangunan;

class SejarahViewController extends Controller
{
    public function show()
    {
        $sejarah = Sejarah::first();
        $buildings = sejarah_bangunan::all();
        return view('sejarah', compact('sejarah', 'buildings'));
    }

    public function editView()
    {
        $sejarah = Sejarah::first();
        
        if (!$sejarah) {
            $sejarah = Sejarah::create();
        }
        
        $buildings = sejarah_bangunan::all();
        return view('admin.edit-sejarah', compact('sejarah', 'buildings'));
    }
}

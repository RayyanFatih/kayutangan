<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class ProfilViewController extends Controller
{
    /**
     * Display the profil page
     */
    public function show()
    {
        $profil = Profil::first() ?? new Profil();
        $pengurus = Pengurus::all();
        
        return view('profil', compact('profil', 'pengurus'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'banner_image',
        'profil_image_1',
        'profil_image_2',
        'profil_image_3',
        'intro_text',
        'aktivitas_kreatif_title',
        'aktivitas_kreatif_text',
        'aktivitas_kreatif_image',
        'pejalan_kaki_title',
        'pejalan_kaki_text',
        'pejalan_kaki_image',
        'umkm_title',
        'umkm_text',
        'umkm_image',
        'wisata_title',
        'wisata_text',
        'wajah_baru_title',
        'wajah_baru_text',
    ];
}

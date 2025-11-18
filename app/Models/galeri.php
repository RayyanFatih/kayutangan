<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
    protected $fillable = [
        'nama_pengirim',
        'kategori',
        'image_path',
        'likes_count',
        'status',
    ];

    // relasi ke likes
    public function likes()
    {
        return $this->hasMany(jumlah_like::class, 'gallery_id');
    }
}

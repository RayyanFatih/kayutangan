<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 

class sejarah_bangunan extends Model
{
    protected $fillable = [
        'nama_bangunan',
        'slug',
        'tahun_dibangun',
        'lokasi',
        'gambar_bangunan',
        'deskripsi',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            // Jika slug belum diisi, generate otomatis
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title . '-' . Str::random(6));
            }
        });

        static::updating(function ($model) {
            // Jika judul berubah → update slug baru
            if ($model->isDirty('title')) {
                $model->slug = Str::slug($model->title . '-' . Str::random(6));
            }
        });
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class map_locations extends Model
{
    protected $fillable = [
        'map_id',
        'nama',
        'slug',
        'deskripsi',
        'kategori',
        'x',
        'y',
        'gambar',
        'gmap_link',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            // generate slug otomatis ketika membuat data
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name . '-' . Str::random(6));
            }
        });

        static::updating(function ($model) {
            // jika name berubah, slug diperbarui
            if ($model->isDirty('nama')) {
                $model->slug = Str::slug($model->name . '-' . Str::random(6));
            }
        });
    }

    public function map()
    {
        return $this->belongsTo(maps::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class destinasi_wisata extends Model
{
    protected $fillable = [
        'nama',
        'slug',
        'gambar',
        'deskripsi',
        'alamat',
        'jam_buka_tutup',
        'kategori',
        'map_location_id'
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name . '-' . Str::random(6));
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('name')) {
                $model->slug = Str::slug($model->name . '-' . Str::random(6));
            }
        });
    }

    public function mapLocation()
    {
        return $this->belongsTo(map_locations::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class maps extends Model
{
    protected $fillable = [
        'judul',
        'gambar',
        'width',
        'height',
    ];

    public function locations()
    {
        return $this->hasMany(map_locations::class);
    }
}

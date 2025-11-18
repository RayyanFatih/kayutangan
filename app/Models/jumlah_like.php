<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jumlah_like extends Model
{
    protected $fillable = [
        'gallery_id',
        'ip_address'
    ];

    public function gallery()
    {
        return $this->belongsTo(galeri::class, 'gallery_id');
    }
}

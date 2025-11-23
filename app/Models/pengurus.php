<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'nomor',
        'email',
        'instagram',
        'facebook',
        'linkedin',
    ];
}


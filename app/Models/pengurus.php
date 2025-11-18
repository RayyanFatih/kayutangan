<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengurus extends Model
{
    protected $fillable = [
        'nama',
        'jabatan',
        'nomor',
        'email',
        'foto',
        'instagram',
        'facebook',
        'linkedin',
    ];
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    use HasFactory;

    protected $table = 'sejarah';

    protected $fillable = [
        'intro_text',
        'masa_kolonial_title',
        'masa_kolonial_image',
        'masa_kolonial_text',
        'kemerdekaan_title',
        'kemerdekaan_text',
        'revitalisasi_title',
        'revitalisasi_text',
        'menjaga_jejak_title',
        'menjaga_jejak_text',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class berita extends Model
{
    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'slug',
        'gambar',
        'ringkasan',
        'konten'
    ];

    /**
     * Boot method untuk membuat slug otomatis.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);

            // Jika slug sudah ada, tambahkan angka unik
            $originalSlug = $news->slug;
            $counter = 1;

            while (static::where('slug', $news->slug)->exists()) {
                $news->slug = $originalSlug . '-' . $counter++;
            }
        });

        static::updating(function ($news) {
            // update slug jika title berubah
            if ($news->isDirty('title')) {
                $news->slug = Str::slug($news->title);

                $originalSlug = $news->slug;
                $counter = 1;

                while (static::where('slug', $news->slug)
                        ->where('id', '!=', $news->id)
                        ->exists()) {
                    $news->slug = $originalSlug . '-' . $counter++;
                }
            }
        });
    }
}

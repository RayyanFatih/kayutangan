<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'judul',
        'slug',
        'gambar',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'ringkasan',
        'konten',
        'status'
    ];

    /**
     * Auto-generate slug.
     */
    protected static function boot()
    {
        parent::boot();

        // Saat membuat event
        static::creating(function ($event) {
            $event->slug = Str::slug($event->title);

            $base = $event->slug;
            $counter = 1;

            while (static::where('slug', $event->slug)->exists()) {
                $event->slug = $base . '-' . $counter++;
            }
        });

        // Saat meng-update event
        static::updating(function ($event) {
            if ($event->isDirty('title')) {
                $event->slug = Str::slug($event->title);

                $base = $event->slug;
                $counter = 1;

                while (
                    static::where('slug', $event->slug)
                    ->where('id', '!=', $event->id)
                    ->exists()
                ) {
                    $event->slug = $base . '-' . $counter++;
                }
            }
        });
    }
}

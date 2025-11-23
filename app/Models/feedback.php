<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $fillable = [
        'nama',
        'nomor',
        'email',
        'kategori',
        'pesan',
        'status',
        'checked_by',
        'ip_address',
        'user_agent'
    ];

    /**
     * Relasi ke admin yang mengecek feedback.
     */
    public function checkedBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'checked_by');
    }

    /**
     * Boot method untuk mencatat IP & User-Agent otomatis
     * saat user mengirim feedback.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($feedback) {
            // Simpan otomatis IP dan User-Agent
            $feedback->ip_address = request()->ip();
            $feedback->user_agent = request()->userAgent();

            // Pastikan status default selalu 'pending'
            if (empty($feedback->status)) {
                $feedback->status = 'pending';
            }
        });
    }
}

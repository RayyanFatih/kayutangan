<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim');
            $table->enum('kategori', [
                'cafe',
                'bangunan',
                'destinasi_wisata',
                'kuliner',
                'pemandangan',
                'umkm',
                'penduduk_lokal'
            ]);
            $table->string('image_path'); // nama file foto
            $table->unsignedBigInteger('likes_count')->default(0);
            $table->enum('status', ['pending', 'approved'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};

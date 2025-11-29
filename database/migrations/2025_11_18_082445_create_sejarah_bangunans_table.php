<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sejarah_bangunans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bangunan');
            $table->string('slug')->unique(); 
            $table->integer('tahun_dibangun')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('gambar_bangunan')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sejarah_bangunans');
    }
};


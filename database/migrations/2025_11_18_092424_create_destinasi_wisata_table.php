<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('destinasi_wisata', function (Blueprint $table) {
    $table->id();
    $table->string('nama');                     // Nama destinasi wisata
    $table->string('slug')->unique();           // Slug untuk halaman detail
    $table->string('gambar')->nullable();        // Foto utama
    $table->text('deskripsi')->nullable(); // Deskripsi singkat
    $table->text('alamat')->nullable();
    $table->text('jam_buka_tutup')->nullable(); 
    
    $table->enum('kategori', [
        'nongkrong',
        'wisata',
        'kuliner'
    ]);

    // opsional → dipakai untuk fitur arahkan ke maps
    $table->foreignId('map_location_id')
          ->nullable()
          ->constrained('map_locations')
          ->nullOnDelete();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasi_wisata');
    }
};

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
       Schema::create('map_locations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('map_id')->constrained('maps')->onDelete('cascade');
    
    $table->string('nama');           // nama tempat
    $table->string('slug')->unique(); // untuk halaman detail
    $table->text('deskripsi')->nullable();

    $table->enum('kategori', [
        'tempat nongkrong',
        'wisata',
        'kuliner',
    ]);

    $table->integer('x');             // posisi horizontal (pixel)
    $table->integer('y');             // posisi vertical (pixel)

    $table->string('gambar')->nullable();      // foto titik
    $table->string('gmap_link')->nullable();  // opsional → buka rute google maps asli
    
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('map_locations');
    }
};

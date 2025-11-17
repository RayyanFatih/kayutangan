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
        Schema::create('media', function (Blueprint $table) {
            $table->id();

            // Kolom untuk menyimpan informasi gambar
            $table->string('nama_file');         // Nama file yang disimpan di disk
            $table->string('tipe_file')->nullable(); // Tipe file (misalnya, image/jpeg)
            $table->string('path');              // Path relatif ke file

            // Kolom metadata
            $table->string('alt_text')->nullable(); // Teks alternatif untuk SEO

            // *** KOLOM POLIMORFIK ***
            // Ini akan membuat 2 kolom: 'mediable_id' dan 'mediable_type'
            // 'mediable_id' akan menyimpan ID dari pemilik (misalnya, ID Produk)
            // 'mediable_type' akan menyimpan nama Model pemilik (misalnya, App\Models\Product)
            $table->morphs('mediable'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
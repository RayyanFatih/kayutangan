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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');           // judul berita
            $table->string('slug')->unique();  // slug SEO
            $table->string('gambar')->nullable(); // 1 gambar utama
            $table->text('ringkasan')->nullable(); // ringkasan/deskripsi singkat
            $table->longText('konten');        // isi berita lengkap
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};

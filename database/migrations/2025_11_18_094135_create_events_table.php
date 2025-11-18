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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('judul');               // Judul event
            $table->string('slug')->unique();      // Slug SEO
            $table->string('gambar')->nullable();   // Gambar event
            $table->date('tanggal_mulai');            // Tanggal mulai
            $table->date('tanggal_selesai')->nullable();  // Tanggal selesai
            $table->string('lokasi');            // Lokasi event
            $table->text('ringkasan')->nullable();   // Deskripsi singkat
            $table->longText('konten');           // Isi detail
            $table->enum('status', ['draft', 'published'])->default('draft'); // Status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

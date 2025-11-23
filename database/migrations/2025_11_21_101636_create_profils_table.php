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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            
            // Banner section
            $table->string('banner_image')->nullable();
            
            // Profil section (3 gambar)
            $table->string('profil_image_1')->nullable();
            $table->string('profil_image_2')->nullable();
            $table->string('profil_image_3')->nullable();
            
            // Deskripsi untuk setiap bagian
            $table->text('intro_text')->nullable();
            $table->text('aktivitas_kreatif_text')->nullable();
            $table->text('aktivitas_kreatif_image')->nullable();
            $table->text('pejalan_kaki_text')->nullable();
            $table->text('pejalan_kaki_image')->nullable();
            $table->text('umkm_text')->nullable();
            $table->text('umkm_image')->nullable();
            $table->text('wisata_text')->nullable();
            $table->text('wajah_baru_text')->nullable();
            
            // Pengurus (gambar dan jabatan)
            $table->string('ketua_image')->nullable();
            $table->string('wakil_image')->nullable();
            $table->string('bendahara_image')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};

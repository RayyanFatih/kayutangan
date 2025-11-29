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
        Schema::create('sejarah', function (Blueprint $table) {
            $table->id();
            $table->longText('intro_text')->nullable();
            
            // Masa Kolonial Section
            $table->string('masa_kolonial_title')->nullable();
            $table->string('masa_kolonial_image')->nullable();
            $table->longText('masa_kolonial_text')->nullable();
            
            // Masa Kemerdekaan Section
            $table->string('kemerdekaan_title')->nullable();
            $table->longText('kemerdekaan_text')->nullable();
            
            // Revitalisasi Section
            $table->string('revitalisasi_title')->nullable();
            $table->longText('revitalisasi_text')->nullable();
            
            // Menjaga Jejak Section
            $table->string('menjaga_jejak_title')->nullable();
            $table->longText('menjaga_jejak_text')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sejarah');
    }
};

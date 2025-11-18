<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jumlah_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_galeri');
            $table->string('ip_address');
            $table->timestamps();

            $table->foreign('id_galeri')
                  ->references('id')->on('galeris')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jumlah_likes');
    }
};

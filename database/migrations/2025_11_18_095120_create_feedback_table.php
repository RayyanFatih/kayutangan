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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();

            // Data pengguna
            $table->string('nama', 100);              // Nama (validasi panjang)
            $table->string('nomor', 20);              // Nomor HP (validasi angka)
            $table->string('email', 150);             // Email valid
            $table->string('kategori', 100);          // Jenis keluhan
            
            // Kritik / saran
            $table->enum('tipe', ['kritik', 'saran']);

            // Pesan
            $table->text('pesan');                  // Isi pesan

            // Status proses feedback
            $table->enum('status', ['pending', 'reviewing', 'diselesaikan', 'closed'])
                  ->default('pending');

            // Admin yang mengecek (nullable)
            $table->unsignedBigInteger('checked_by')->nullable();
            $table->foreign('checked_by')->references('id')->on('users')->onDelete('set null');

            // Data tambahan opsional
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};

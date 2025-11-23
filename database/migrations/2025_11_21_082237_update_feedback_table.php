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
        Schema::table('feedback', function (Blueprint $table) {
            // Ubah kolom kategori menjadi jenis_keluhan
            if (Schema::hasColumn('feedback', 'kategori')) {
                $table->renameColumn('kategori', 'jenis_keluhan');
            }
            
            // Ubah kolom tipe menjadi rating
            if (Schema::hasColumn('feedback', 'tipe')) {
                $table->renameColumn('tipe', 'rating');
            }
            
            // Pastikan kolom-kolom yang diperlukan ada
            if (!Schema::hasColumn('feedback', 'jenis_keluhan')) {
                $table->string('jenis_keluhan')->default('saran');
            }
            
            if (!Schema::hasColumn('feedback', 'rating')) {
                $table->string('rating')->default('saran');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feedback', function (Blueprint $table) {
            //
        });
    }
};

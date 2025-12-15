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
            // Hapus field 'tipe' karena form pakai 'kategori' sebagai pengganti
            // Kategori: Pelayanan, Fasilitas, Kebersihan, Kualitas, Keamanan, Lainnya
            if (Schema::hasColumn('feedback', 'tipe')) {
                $table->dropColumn('tipe');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->enum('tipe', ['kritik', 'saran'])->after('kategori')->default('kritik');
        });
    }
};

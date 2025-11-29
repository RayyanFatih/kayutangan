<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profils', function (Blueprint $table) {
            if (!Schema::hasColumn('profils', 'aktivitas_kreatif_title')) {
                $table->string('aktivitas_kreatif_title')->nullable()->after('intro_text');
            }
            if (!Schema::hasColumn('profils', 'pejalan_kaki_title')) {
                $table->string('pejalan_kaki_title')->nullable()->after('aktivitas_kreatif_image');
            }
            if (!Schema::hasColumn('profils', 'umkm_title')) {
                $table->string('umkm_title')->nullable()->after('pejalan_kaki_image');
            }
            if (!Schema::hasColumn('profils', 'wisata_title')) {
                $table->string('wisata_title')->nullable()->after('umkm_image');
            }
            if (!Schema::hasColumn('profils', 'wajah_baru_title')) {
                $table->string('wajah_baru_title')->nullable()->after('wisata_text');
            }
        });
    }

    public function down(): void
    {
        Schema::table('profils', function (Blueprint $table) {
            if (Schema::hasColumn('profils', 'aktivitas_kreatif_title')) {
                $table->dropColumn('aktivitas_kreatif_title');
            }
            if (Schema::hasColumn('profils', 'pejalan_kaki_title')) {
                $table->dropColumn('pejalan_kaki_title');
            }
            if (Schema::hasColumn('profils', 'umkm_title')) {
                $table->dropColumn('umkm_title');
            }
            if (Schema::hasColumn('profils', 'wisata_title')) {
                $table->dropColumn('wisata_title');
            }
            if (Schema::hasColumn('profils', 'wajah_baru_title')) {
                $table->dropColumn('wajah_baru_title');
            }
        });
    }
};

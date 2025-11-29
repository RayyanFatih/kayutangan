<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profils', function (Blueprint $table) {
            if (!Schema::hasColumn('profils', 'page_title')) {
                $table->string('page_title')->nullable()->after('id');
            }
            
            // Drop pengurus-related columns if they exist
            if (Schema::hasColumn('profils', 'ketua_image')) {
                $table->dropColumn('ketua_image');
            }
            if (Schema::hasColumn('profils', 'wakil_image')) {
                $table->dropColumn('wakil_image');
            }
            if (Schema::hasColumn('profils', 'bendahara_image')) {
                $table->dropColumn('bendahara_image');
            }
        });
    }

    public function down(): void
    {
        Schema::table('profils', function (Blueprint $table) {
            if (Schema::hasColumn('profils', 'page_title')) {
                $table->dropColumn('page_title');
            }
        });
    }
};

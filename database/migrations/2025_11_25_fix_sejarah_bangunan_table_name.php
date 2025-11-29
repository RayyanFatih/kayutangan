<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Jika tabel sejarah_bangunan ada, rename ke sejarah_bangunans
        if (Schema::hasTable('sejarah_bangunan')) {
            DB::statement('RENAME TABLE sejarah_bangunan TO sejarah_bangunans');
        }
    }

    public function down(): void
    {
        // Untuk rollback
        if (Schema::hasTable('sejarah_bangunans')) {
            DB::statement('RENAME TABLE sejarah_bangunans TO sejarah_bangunan');
        }
    }
};

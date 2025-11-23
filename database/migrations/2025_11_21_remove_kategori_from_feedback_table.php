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
        if (Schema::hasColumn('feedback', 'kategori')) {
            Schema::table('feedback', function (Blueprint $table) {
                $table->dropColumn('kategori');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasColumn('feedback', 'kategori')) {
            Schema::table('feedback', function (Blueprint $table) {
                $table->string('kategori', 100)->after('email');
            });
        }
    }
};

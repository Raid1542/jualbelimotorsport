<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tentang_kami', function (Blueprint $table) {
            $table->longText('tim')->nullable(); // kolom tambahan
        });
    }

    public function down(): void
    {
        Schema::table('tentang_kami', function (Blueprint $table) {
            $table->dropColumn('tim');
        });
    }
};

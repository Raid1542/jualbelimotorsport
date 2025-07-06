<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('pesanan', function (Blueprint $table) {
        $table->string('alamat')->nullable()->after('user_id');
        $table->string('telepon')->nullable()->after('alamat');
    });
}

public function down()
{
    Schema::table('pesanan', function (Blueprint $table) {
        $table->dropColumn(['alamat', 'telepon']);
    });
}
};
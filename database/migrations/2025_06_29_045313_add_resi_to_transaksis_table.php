<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->string('no_resi')->nullable()->after('status');
            $table->timestamp('tanggal_kirim')->nullable()->after('no_resi');
        });
    }

    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropColumn(['no_resi', 'tanggal_kirim']);
        });
    }
};
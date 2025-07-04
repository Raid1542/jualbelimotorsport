<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('metode_pembayaran')->default('cod');
            $table->enum('status', [
                'menunggu konfirmasi', 
                'diproses', 
                'diperjalanan', 
                'selesai'
            ])->default('menunggu konfirmasi');
            $table->integer('total')->default(0);
            $table->string('no_resi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Balikkan migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('produk_id');
            $table->integer('jumlah');
            $table->decimal('harga', 12, 2);
            $table->timestamps();

            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('detail_pesanans');
    }
};

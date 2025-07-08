<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanan_id'); // Ganti dari transaksi_id
            $table->unsignedBigInteger('produk_id');
            $table->integer('jumlah');
            $table->decimal('harga', 12, 2);
            $table->timestamps();

            $table->foreign('pesanan_id')->references('id')->on('pesanans')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade'); // tergantung nama tabel
        });
    }

    public function down(): void {
        Schema::dropIfExists('detail_pesanan');
    }
};

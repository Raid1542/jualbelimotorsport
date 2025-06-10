<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 15, 2);
            $table->integer('stok')->default(0);
            $table->string('gambar')->nullable();
            $table->boolean('unggulan')->default(false);
            $table->string('warna')->nullable();

            $table->unsignedBigInteger('kategori_id');

            $table->foreign('kategori_id')
                  ->references('id')
                  ->on('kategori')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};

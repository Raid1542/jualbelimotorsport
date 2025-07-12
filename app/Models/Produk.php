<?php

// app/Models/Produk.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    protected $table = 'produk'; // sesuai nama tabel

    protected $fillable = [
    'nama', 'deskripsi', 'harga', 'stok', 'gambar', 'warna', 'kategori_id',
];


   public function kategori()
{
    return $this->belongsTo(Kategori::class);
}

public function detailPesanan()
{
    return $this->hasMany(DetailPesanan::class);
}


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk'; // nama tabel

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'stok',
        'warna',
        'kategori',  // foreign key kategori
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}

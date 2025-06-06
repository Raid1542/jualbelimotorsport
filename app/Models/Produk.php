<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk'; // Sesuaikan jika nama tabel berbeda

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'stok',         // <--- TAMBAH INI
        'warna',        // <--- TAMBAH INI
        'kategori',     // <--- TAMBAH INI
    ];


    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}

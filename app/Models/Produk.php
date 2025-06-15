<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'nama', 'deskripsi', 'harga', 'stok', 'gambar', 'warna', 'kategori_id','created_at','updated_at'
    ];

    public function kategori()
{
    return $this->belongsTo(Kategori::class, 'kategori_id');
}

}

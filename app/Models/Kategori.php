<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori'; // Sesuaikan dengan nama tabel kamu

    protected $fillable = ['nama'];

    // Relasi ke produk
    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_kategori');
    }
}

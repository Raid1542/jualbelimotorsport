<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
use App\Models\Produk;

class DetailPesanan extends Model
{
    protected $table = 'detail_pesanan'; // atau sesuaikan dengan nama tabel di database

    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'jumlah',
        'harga'
    ];

    // Relasi ke Transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    // Relasi ke Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}

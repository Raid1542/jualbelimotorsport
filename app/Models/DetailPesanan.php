<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
use App\Models\Produk;

class DetailPesanan extends Model
{
    protected $fillable = ['transaksi_id', 'produk_id', 'jumlah', 'harga'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
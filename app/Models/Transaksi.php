<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPesanan;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    protected $fillable = [
        'user_id', 'status', 'tanggal', 'total', 'metode_pembayaran'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'transaksi_id');
    }
}
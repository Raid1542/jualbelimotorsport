<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan'; // <- wajib karena nama model bukan plural

    protected $fillable = [
        'user_id', 'alamat', 'telepon',
        'metode_pembayaran', 'total', 'status', 'no_resi'
    ];

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

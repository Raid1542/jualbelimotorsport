<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPesanan;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama', 'alamat', 'no_hp', 'total_harga', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail()
{
    return $this->hasMany(DetailPesanan::class);
}
}

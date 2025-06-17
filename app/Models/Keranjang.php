<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    // ✅ Tambahkan fillable agar mass assignment bisa dilakukan
    protected $fillable = ['user_id', 'produk_id', 'jumlah'];

    // ✅ Optional, jika kamu ingin memastikan tipe data dikonversi secara otomatis
    protected $casts = [
        'user_id' => 'integer',
        'produk_id' => 'integer',
        'jumlah' => 'integer',
    ];

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

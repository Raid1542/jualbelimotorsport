<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'user_id',
        'kode_invoice',
        'status',
        'resi'
    ];



    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
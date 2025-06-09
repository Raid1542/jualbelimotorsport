<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Jika menggunakan Sanctum, bisa dihapus kalau gak perlu

class User extends Authenticatable
{
    // Kolom yang bisa diisi massal (mass assignable)
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    // Kolom yang disembunyikan saat dikonversi ke array atau JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Kolom yang otomatis di-cast ke tipe data tertentu
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Override username sebagai kolom login
     */
    public function getAuthIdentifierName()
    {
        return 'username';  // pakai username sebagai identifier login
    }
}

<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'telepon',
        'alamat',
        'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'username'; // login pakai username
    }
}

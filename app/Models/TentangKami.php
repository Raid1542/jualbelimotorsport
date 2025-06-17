<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    protected $table = 'tentang_kami';

    protected $fillable = ['deskripsi', 'cerita', 'visi', 'misi', 'nilai', 'tim'];

    protected $casts = [
        'tim' => 'array',
    ];
}

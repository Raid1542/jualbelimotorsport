<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::insert([
            ['nama' => 'Motor Sport'],
            ['nama' => 'Motor'],
            ['nama' => 'Mobil'],
        ]);
    }
}

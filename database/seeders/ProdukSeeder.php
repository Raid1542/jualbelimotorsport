<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        DB::table('produks')->insert([
            [
                'nama' => 'Yamaha R15 V4',
                'deskripsi' => 'Motor sport dengan teknologi canggih dan desain agresif.',
                'gambar' => '/images/Yamaha.jpg',
                'harga' => 38000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Honda CBR250RR',
                'deskripsi' => 'Motor balap ringan dengan performa tinggi.',
                'gambar' => '/images/Honda.jpg',
                'harga' => 62000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ducati Panigale V4',
                'deskripsi' => 'Motor sport premium dengan mesin bertenaga besar.',
                'gambar' => '/images/Ducati.jpg',
                'harga' => 799000000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

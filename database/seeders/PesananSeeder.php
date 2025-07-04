<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        Pesanan::create([
            'user_id' => 1,
            'total' => 250000,
            'status' => 'menunggu konfirmasi',
            'metode_pembayaran' => 'cod',
            'no_resi' => null
        ]);
    }
}

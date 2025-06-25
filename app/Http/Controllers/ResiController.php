<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResiController extends Controller
{
    public function resi()
    {
        $data = [
            'id_resi' => 'MTR123456789',
            'kode_pesanan' => 'ORD-MINI-20250625-001',
            'nama' => 'Raid Aqil Athallah',
            'alamat' => 'Jl. Hobi Motor Miniatur No. 46, Bandung',
            'produk' => [
                ['nama' => 'Miniatur Yamaha R1', 'skala' => '1:18', 'jumlah' => 1, 'harga' => 249000],
                ['nama' => 'Miniatur Honda CBR600RR', 'skala' => '1:24', 'jumlah' => 2, 'harga' => 189000],
            ],
            'total' => 249000 + 2 * 189000 // = 627000
        ];

        return view('pages.resi', compact('data'));
    }
}

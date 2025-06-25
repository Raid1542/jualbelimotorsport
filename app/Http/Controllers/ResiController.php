<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResiController extends Controller
{
    public function resi()
    {
        $data = [
            'id_resi' => '1214144',
            'kode_pesanan' => 'ORD-20230504-001',
            'nama' => 'Prima Rizky Islami',
            'alamat' => 'Contoh Alamat No. 123, Jakarta',
            'produk' => [
                ['nama' => 'Kaus Polos', 'varian' => 'Putih', 'jumlah' => 2, 'harga' => 150000],
                ['nama' => 'Celana Jeans', 'varian' => 'Hitam', 'jumlah' => 1, 'harga' => 349999],
            ],
            'total' => 649999
        ];

        return view('pages.resi', compact('data'));
    }
}

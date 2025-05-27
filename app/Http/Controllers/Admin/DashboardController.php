<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'kategori_produk' => 4,
            'jumlah_produk' => 30,
            'pesanan_terbaru' => 2,
            'total_pesanan' => 50,
            'pendapatan_harian' => 100000000,
            'pendapatan_bulanan' => 300000000,
            'pesanan_list' => [
                ['id' => 1, 'produk' => 'Produk 1', 'jumlah' => 2, 'status' => 'Dikirim', 'total' => 200000],
                ['id' => 2, 'produk' => 'Produk 2', 'jumlah' => 2, 'status' => 'Dikirim', 'total' => 200000],
                ['id' => 3, 'produk' => 'Produk 3', 'jumlah' => 2, 'status' => 'Dikirim', 'total' => 200000],
            ]
        ];

        return view('pages.admin.dashboard', $data);
    }
}

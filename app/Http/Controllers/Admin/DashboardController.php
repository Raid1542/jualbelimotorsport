<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;  // Asumsi ada model kategori
use App\Models\Pesanan;   // Asumsi ada model pesanan

class DashboardController extends Controller
{
   public function dashboard()
{
    $produk = Produk::all();
    $jumlah_produk = $produk->count();

    $kategori_produk = Kategori::all();

    // Data dummy untuk pesanan
    $pesanan_terbaru = 0;
    $total_pesanan = 0;

    $pesanan_list = [
        ['id' => '-', 'produk' => '-', 'jumlah' => '-', 'status' => '-', 'total' => 0],
    ];

    $pendapatan_harian = 0;
    $pendapatan_bulanan = 0;

    return view('pages.admin.dashboard', [
        'kategori_produk' => $kategori_produk,
        'jumlah_produk' => $jumlah_produk,
        'pesanan_terbaru' => $pesanan_terbaru,
        'total_pesanan' => $total_pesanan,
        'pendapatan_harian' => $pendapatan_harian,
        'pendapatan_bulanan' => $pendapatan_bulanan,
        'pesanan_list' => $pesanan_list,
    ]);
}

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Kategori;
use Carbon\Carbon;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $jumlah_produk = Produk::count();
        $kategori_produk = Kategori::withCount('produk')->get();
        $total_pesanan = Pesanan::count();
        $pesanan_terbaru = Pesanan::where('created_at', '>=', now()->subDay())->count();

        $pendapatan_harian = Pesanan::whereDate('created_at', Carbon::today())->sum('total');
        $pendapatan_bulanan = Pesanan::whereMonth('created_at', Carbon::now()->month)->sum('total');

        $pesanan_list = Pesanan::with('detailPesanan.produk')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'produk' => $order->detailPesanan->pluck('produk.nama')->join(', '),
                    'jumlah' => $order->detailPesanan->sum('jumlah'),
                    'status' => ucfirst($order->status),
                    'total' => $order->total,
                ];
            });

        return view('pages.admin.dashboard', compact(
            'jumlah_produk',
            'kategori_produk',
            'total_pesanan',
            'pesanan_terbaru',
            'pendapatan_harian',
            'pendapatan_bulanan',
            'pesanan_list'
        ));
    }
}

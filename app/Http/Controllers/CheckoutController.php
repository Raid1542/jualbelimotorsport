<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Transaksi;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout dari item yang dipilih saja (dicentang)
    public function checkout(Request $request)
{
    $selectedItems = $request->items;

    if (!$selectedItems || count($selectedItems) === 0) {
        return redirect()->back()->with('error', 'Silakan pilih minimal satu produk.');
    }

    // Ambil data keranjang terpilih
    $keranjang = Keranjang::with('produk')
        ->whereIn('id', $selectedItems)
        ->get();

    $user = auth()->user();
    $subtotal = $keranjang->sum(function ($item) {
        return $item->produk ? $item->produk->harga * $item->jumlah : 0;
    });

    return view('checkout', compact('keranjang', 'user', 'subtotal', 'ongkir', 'total'));
}


    // Untuk validasi keranjang tidak kosong saat klik checkout dari halaman keranjang
    public function pilih()
    {
        $user = Auth::user();
        $keranjang = Keranjang::with('produk')->where('user_id', $user->id)->get();

        if ($keranjang->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang kamu kosong.');
        }

        $subtotal = $keranjang->sum(function ($item) {
            return $item->produk->harga * $item->jumlah;
        });

        $ongkir = 10000;
        $total = $subtotal + $ongkir;

        return view('pages.checkout', compact('keranjang', 'user', 'subtotal', 'ongkir', 'total'));
    }

    // Menampilkan detail konfirmasi pembayaran (setelah transaksi)
    public function konfirmasi($id)
    {
        $transaksi = Transaksi::with('detail.produk')->findOrFail($id);
        return view('pages.konfirmasi_pembayaran', compact('transaksi'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $produk = Produk::findOrFail($id);
        return view('pages.checkout', compact('produk'));
    }


    public function checkoutTerpilih(Request $request)
{
    $keranjangId = $request->input('keranjang_id', []);

    if (empty($keranjangId)) {
        return back()->with('error', 'Pilih setidaknya satu item untuk checkout.');
    }

    $items = Keranjang::whereIn('id', $keranjangId)->with('produk')->get();

    return view('checkout.terpilih', compact('items'));
}


    public function proses(Request $request)
{
    $produk = Produk::findOrFail($request->produk_id);

    // Simulasikan penyimpanan transaksi atau alur pembayaran
    // Bisa ditambahkan logika penyimpanan ke tabel orders

    return redirect()->route('home')->with('success', 'Pembelian berhasil! Silakan cek email Anda.');
}

}

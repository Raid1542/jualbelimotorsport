<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $produk = Produk::findOrFail($id);
        return view('pages.checkout', compact('produk'));
    }

    public function proses(Request $request)
{
    $produk = Produk::findOrFail($request->produk_id);

    // Simulasikan penyimpanan transaksi atau alur pembayaran
    // Bisa ditambahkan logika penyimpanan ke tabel orders

    return redirect()->route('home')->with('success', 'Pembelian berhasil! Silakan cek email Anda.');
}

}

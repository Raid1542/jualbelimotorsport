<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $selectedItems = $request->items;

        if (!$selectedItems || count($selectedItems) === 0) {
            return redirect()->back()->with('error', 'Silakan pilih minimal satu produk.');
        }

        $keranjang = Keranjang::with('produk')
            ->whereIn('id', $selectedItems)
            ->get();

        $user = auth()->user();
        $subtotal = $keranjang->sum(fn($item) => $item->produk->harga * $item->jumlah);
        $total = $subtotal;

        return view('pages.checkout', compact('keranjang', 'user', 'subtotal', 'total', 'selectedItems'));
    }

    public function prosesCheckout(Request $request)
    {
        $user = Auth::user();
        $keranjangIds = $request->input('items', []);

        if (empty($keranjangIds)) {
            return redirect()->route('keranjang.index')->with('error', 'Tidak ada item yang dipilih.');
        }

        $keranjang = Keranjang::with('produk')
            ->whereIn('id', $keranjangIds)
            ->where('user_id', $user->id)
            ->get();

        if ($keranjang->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang kosong.');
        }

        $subtotal = $keranjang->sum(fn($item) => $item->produk->harga * $item->jumlah);
        $total = $subtotal;

        $transaksi = Transaksi::create([
            'user_id' => $user->id,
            'total' => $total,
            'metode_pembayaran' => $request->metode_pembayaran_terpilih,
            'status' => 'pending',
        ]);

        foreach ($keranjang as $item) {
            DetailPesanan::create([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $item->produk_id,
                'jumlah' => $item->jumlah,
                'harga' => $item->produk->harga,
            ]);
        }

        Keranjang::whereIn('id', $keranjangIds)->delete();

        return redirect()->route('checkout.konfirmasi', $transaksi->id)->with('success', 'Pesanan berhasil dibuat.');
    }

    public function konfirmasi($id)
    {
        $transaksi = Transaksi::with('detail.produk')->findOrFail($id);
        return view('pages.konfirmasi_pembayaran', compact('transaksi'));
    }

    public function beliSekarang($id)
{
    $user = Auth::user();
    $produk = Produk::findOrFail($id);

    $subtotal = $produk->harga;
    $total = $subtotal;

    return view('pages.checkout_beli_sekarang', compact('produk', 'user', 'subtotal', 'total'));
}

}

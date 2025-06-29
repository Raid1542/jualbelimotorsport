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
    // 🧾 Checkout dari keranjang
    public function checkout(Request $request)
    {
        $selectedItems = $request->items;

        if (!$selectedItems || count($selectedItems) === 0) {
            return redirect()->back()->with('error', 'Silakan pilih minimal satu produk.');
        }

        $keranjang = Keranjang::with('produk')
            ->whereIn('id', $selectedItems)
            ->where('user_id', auth()->id())
            ->get();

        $user = auth()->user();
        $subtotal = $keranjang->sum(fn($item) => $item->produk->harga * $item->jumlah);
        $total = $subtotal;
        $totalProduk = $keranjang->sum('jumlah');

        return view('pages.checkout', compact('keranjang', 'user', 'subtotal', 'total', 'totalProduk', 'selectedItems'));
    }

    // 🧾 Checkout dari beli sekarang
    public function beliSekarang($id)
    {
        $user = Auth::user();
        $produk = Produk::findOrFail($id);

        $subtotal = $produk->harga;
        $total = $subtotal;

        return view('pages.checkout', compact('produk', 'user', 'subtotal', 'total'));
    }

    // ✅ Proses Checkout
    public function prosesCheckout(Request $request)
    {
        $user = Auth::user();
        $metode = $request->metode_pembayaran_terpilih ?? 'cod';

        // 🔍 Dari keranjang
        if ($request->has('items')) {
            $keranjangIds = $request->input('items');

            $keranjang = Keranjang::with('produk')
                ->whereIn('id', $keranjangIds)
                ->where('user_id', $user->id)
                ->get();

            if ($keranjang->isEmpty()) {
                return redirect()->route('keranjang.index')->with('error', 'Keranjang kosong.');
            }

            $total = $keranjang->sum(fn($item) => $item->produk->harga * $item->jumlah);

            $transaksi = Transaksi::create([
                'user_id' => $user->id,
                'nama' => $user->name,
                'alamat' => $user->alamat,
                'telepon' => $user->telepon,
                'metode_pembayaran' => $metode,
                'total' => $total,
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

        } else {
            // 🔍 Dari beli langsung
            $produk = Produk::findOrFail($request->produk_id);
            $jumlah = $request->input('jumlah', 1);
            $total = $produk->harga * $jumlah;

            $transaksi = Transaksi::create([
                'user_id' => $user->id,
                'nama' => $user->name,
                'alamat' => $user->alamat,
                'telepon' => $user->telepon,
                'metode_pembayaran' => $metode,
                'total' => $total,
                'status' => 'pending',
            ]);

            DetailPesanan::create([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $produk->id,
                'jumlah' => $jumlah,
                'harga' => $produk->harga,
            ]);
        }

        
       if ($metode === 'qris') {
    return redirect()->route('checkout.qris', $transaksi->id);
}

return redirect()->route('checkout.sukses')->with('success', 'Pesanan berhasil dibuat.');

}

  
    public function sukses()
    {
        return view('pages.checkout_sukses');
    }

    // ➕ Menampilkan halaman QRIS
public function checkoutQris($id)
{
    $transaksi = Transaksi::findOrFail($id);
    return view('pages.checkout_qris', compact('transaksi'));
}

// ✅ Konfirmasi pembayaran QRIS manual
public function konfirmasiQris($id)
{
    $transaksi = Transaksi::findOrFail($id);
    $transaksi->status = 'dibayar';
    $transaksi->save();

    return redirect()->route('pesanan')->with('success', 'Pembayaran berhasil! Pesanan kamu sedang diproses.');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;

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

        // ✅ Validasi alamat dan telepon kosong
        if (empty($user->alamat) || empty($user->telepon)) {
            return redirect()->route('profil.edit')->with('incomplete_profile', 'Silakan lengkapi alamat dan nomor telepon terlebih dahulu sebelum checkout.');
        }

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

            $pesanan = Pesanan::create([
                'user_id' => $user->id,
                'alamat' => $user->alamat,
                'telepon' => $user->telepon,
                'metode_pembayaran' => $metode,
                'total' => $total,
                'status' => $metode === 'cod' ? 'menunggu konfirmasi' : 'pending',
            ]);

            foreach ($keranjang as $item) {
                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $item->produk_id,
                    'jumlah' => $item->jumlah,
                    'harga' => $item->produk->harga,
                ]);
                // Kurangi stok produk
                $produk = $item->produk;
                $produk->stok -= $item->jumlah;
                $produk->save();
            }

            Keranjang::whereIn('id', $keranjangIds)->delete();
        } else {
            // 🔍 Dari beli langsung
            $produk = Produk::findOrFail($request->produk_id);
            $jumlah = $request->input('jumlah', 1);
            $total = $produk->harga * $jumlah;

            $pesanan = Pesanan::create([
                'user_id' => $user->id,
                'alamat' => $user->alamat,
                'telepon' => $user->telepon,
                'metode_pembayaran' => $metode,
                'total' => $total,
                'status' => $metode === 'cod' ? 'menunggu konfirmasi' : 'pending',
            ]);

            DetailPesanan::create([
                'pesanan_id' => $pesanan->id,
                'produk_id' => $produk->id,
                'jumlah' => $jumlah,
                'harga' => $produk->harga,
            ]);
            // Kurangi stok produk
            $produk->stok -= $jumlah;
            $produk->save();
        }

        if ($metode === 'qris') {
            return redirect()->route('checkout.qris', $pesanan->id);
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
        $pesanan = Pesanan::findOrFail($id);
        return view('pages.checkout_qris', compact('pesanan'));
    }

    // ✅ Konfirmasi pembayaran QRIS manual
    public function konfirmasiQris($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 'dibayar';
        $pesanan->save();

        return redirect()->route('pesanan')->with('success', 'Pembayaran berhasil! Pesanan kamu sedang diproses.');
    }

    // CheckoutController.php
public function getSnapToken(Request $request)
{
    // ⛑ Init Midtrans Manual
    \Midtrans\Config::$serverKey = config('midtrans.serverKey');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    $user = auth()->user();
    $orderId = uniqid('ORDER-');
    $dari = $request->input('dari', 'keranjang');
    $total = 0;

    try {
        if ($dari === 'keranjang') {
            // ✅ Validasi items tidak null dan harus array
            $items = $request->input('items');
            if (!is_array($items) || count($items) === 0) {
                return response()->json([
                    'error' => 'Daftar produk tidak valid atau kosong.'
                ], 400);
            }

            $keranjang = Keranjang::with('produk')
                ->whereIn('id', $items)
                ->where('user_id', $user->id)
                ->get();

            $total = $keranjang->sum(fn($item) => $item->produk->harga * $item->jumlah);
        } else {
            // Dari beli sekarang
            $produk = Produk::findOrFail($request->produk_id);
            $total = $produk->harga;
        }

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $total,
            ],
            'enable_payments' => ['qris'], // QRIS only
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->telepon,
            ]
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return response()->json(['snapToken' => $snapToken]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Gagal mendapatkan snap token',
            'message' => $e->getMessage(),
        ], 500);
    }
}



}
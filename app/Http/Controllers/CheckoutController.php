<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
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

    public function beliSekarang($id)
    {
        $user = Auth::user();
        $produk = Produk::findOrFail($id);

        $subtotal = $produk->harga;
        $total = $subtotal;

        return view('pages.checkout', compact('produk', 'user', 'subtotal', 'total'));
    }

    // ✅ Proses checkout (AJAX)
    public function prosesCheckout(Request $request)
    {
        $user = Auth::user();
        $metode = $request->metode_pembayaran_terpilih ?? 'cod';

        // Validasi alamat dan telepon
        if (empty($user->alamat) || empty($user->telepon)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Silakan lengkapi alamat dan nomor telepon terlebih dahulu.'
            ], 422);
        }

        $pesanan = null;

        // Dari keranjang
        if ($request->has('items')) {
            $keranjangIds = $request->input('items');
            $keranjang = Keranjang::with('produk')
                ->whereIn('id', $keranjangIds)
                ->where('user_id', $user->id)
                ->get();

            if ($keranjang->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Keranjang kosong.'
                ], 422);
            }

            $total = $keranjang->sum(fn($item) => $item->produk->harga * $item->jumlah);

            $pesanan = Pesanan::create([
                'user_id' => $user->id,
                'alamat' => $user->alamat,
                'telepon' => $user->telepon,
                'metode_pembayaran' => $metode,
                'total' => $total,
                'status' => $metode === 'cod' ? 'menunggu konfirmasi' : 'menunggu konfirmasi',
            ]);

            foreach ($keranjang as $item) {
                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $item->produk_id,
                    'jumlah' => $item->jumlah,
                    'harga' => $item->produk->harga,
                ]);
                $produk = $item->produk;
                $produk->stok -= $item->jumlah;
                $produk->save();
            }

            Keranjang::whereIn('id', $keranjangIds)->delete();

        } else {
            // Dari beli sekarang
            $produk = Produk::findOrFail($request->produk_id);
            $jumlah = 1;
            $total = $produk->harga * $jumlah;

            $pesanan = Pesanan::create([
                'user_id' => $user->id,
                'alamat' => $user->alamat,
                'telepon' => $user->telepon,
                'metode_pembayaran' => $metode,
                'total' => $total,
                'status' => $metode === 'cod' ? 'menunggu konfirmasi' : 'menunggu konfirmasi',
            ]);

            DetailPesanan::create([
                'pesanan_id' => $pesanan->id,
                'produk_id' => $produk->id,
                'jumlah' => $jumlah,
                'harga' => $produk->harga,
            ]);
            $produk->stok -= $jumlah;
            $produk->save();
        }

        if ($metode === 'qris') {
            return response()->json([
                'status' => 'need_payment',
                'pesanan_id' => $pesanan->id,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'redirect' => route('pesanan'),
        ]);
    }

    public function sukses()
    {
        return view('pages.checkout_sukses');
    }

    // 🔁 Ambil Snap Token (dipanggil setelah pesanan dibuat)
    public function getSnapToken(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $pesanan = Pesanan::findOrFail($request->pesanan_id);
        $user = $pesanan->user;

        $params = [
            'transaction_details' => [
                'order_id' => $pesanan->id,
                'gross_amount' => $pesanan->total,
            ],
            'enable_payments' => ['qris'],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->telepon,
            ],
        ];

        try {
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

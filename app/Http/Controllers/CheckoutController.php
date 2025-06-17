<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function pilih(Request $request)
    {
        $keranjangIds = $request->keranjang_id;

        $keranjangItems = Keranjang::with('produk')->whereIn('id', $keranjangIds)->get();

        $total = $keranjangItems->sum(function ($item) {
            return $item->produk ? $item->produk->harga * $item->jumlah : 0;
        });

        return view('checkout.pilih', compact('keranjangItems', 'total'));
    }

    public function proses(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'pembayaran' => 'required|in:transfer,cod',
        ]);

        DB::beginTransaction();
        try {
            // Simpan pesanan utama
            $pesanan = Pesanan::create([
                'user_id' => Auth::id(),
                'nama_penerima' => $request->nama,
                'alamat' => $request->alamat,
                'metode_pembayaran' => $request->pembayaran,
                'status' => 'menunggu pembayaran', // default
                'total_harga' => 0, // nanti dihitung ulang
            ]);

            $totalHarga = 0;

            // Ambil kembali keranjang (dari sesi sebelumnya)
            $keranjangIds = $request->input('keranjang_id', []);
            $keranjangItems = Keranjang::with('produk')->whereIn('id', $keranjangIds)->get();

            foreach ($keranjangItems as $item) {
                if ($item->produk) {
                    $subtotal = $item->produk->harga * $item->jumlah;
                    $totalHarga += $subtotal;

                    DetailPesanan::create([
                        'pesanan_id' => $pesanan->id,
                        'produk_id' => $item->produk->id,
                        'jumlah' => $item->jumlah,
                        'harga' => $item->produk->harga,
                        'subtotal' => $subtotal,
                    ]);
                }
            }

            // Update total harga di pesanan
            $pesanan->update(['total_harga' => $totalHarga]);

            // Hapus keranjang yang sudah di-checkout
            Keranjang::whereIn('id', $keranjangIds)->delete();

            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memproses pesanan. Silakan coba lagi.');
        }
    }
}

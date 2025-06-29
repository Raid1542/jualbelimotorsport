<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('detailPesanan.produk', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.admin.transaksi', compact('transaksis'));
    }

    public function updateStatus(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->save();

        return redirect()->back()->with('success', 'Status transaksi diperbarui.');
    }

    public function rekap(Request $request)
    {
        $query = Transaksi::with(['user', 'detailPesanan.produk']);

        if ($request->tanggal) {
            $query->whereDate('created_at', $request->tanggal);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->metode) {
            $query->where('metode_pembayaran', $request->metode);
        }

        $transaksis = $query->get();

        return view('pages.admin.rekap-penjualan', compact('transaksis'));
    }

    public function konfirmasi($id)
{
    $transaksi = Transaksi::findOrFail($id);
    if ($transaksi->status === 'dibayar_pending') {
        $transaksi->status = 'dibayar';
        $transaksi->save();
    }
    return redirect()->back()->with('success', 'Pembayaran QRIS dikonfirmasi.');
}

public function kirim(Request $request, $id)
{
    $request->validate([
        'no_resi' => 'required|string|max:50',
    ]);

    $transaksi = Transaksi::findOrFail($id);
    if ($transaksi->status === 'dibayar') {
        $transaksi->status = 'dikirim';
        $transaksi->no_resi = $request->no_resi;
        $transaksi->save();
    }

    return redirect()->back()->with('success', 'Pesanan berhasil dikirim.');
}

}



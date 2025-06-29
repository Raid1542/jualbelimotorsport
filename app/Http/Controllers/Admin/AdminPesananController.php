<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class AdminPesananController extends Controller
{
    // 🔍 Menampilkan semua pesanan dari user
    public function index()
    {
        $pesanan = Transaksi::with('user', 'detailPesanan.produk')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.pesanan.index', compact('pesanan'));
    }

    // ✅ Konfirmasi pesanan (misalnya status jadi dikirim)
    public function konfirmasi($id)
    {
        $pesanan = Transaksi::findOrFail($id);
        $pesanan->status = 'diproses'; // atau 'dikirim' sesuai alur kamu
        $pesanan->save();

        return back()->with('success', 'Pesanan berhasil dikonfirmasi.');
    }

    public function proses($id)
{
    $trx = Transaksi::findOrFail($id);
    $trx->status = 'diproses';
    $trx->save();

    return back()->with('success', 'Pesanan sedang diproses.');
}

public function kirim(Request $request, $id)
{
    $request->validate([
        'no_resi' => 'required|string|max:50',
    ]);

    $trx = Transaksi::findOrFail($id);
    $trx->status = 'dikirim';
    $trx->no_resi = $request->no_resi;
    $trx->tanggal_kirim = now();
    $trx->save();

    return back()->with('success', 'Pesanan telah dikirim.');
}

}

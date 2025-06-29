<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class PesananController extends Controller
{
    public function index()
{
    $pesananAktif = Transaksi::with('detailPesanan.produk')
        ->where('user_id', Auth::id())
        ->where('status', '!=', 'selesai')
        ->orderBy('created_at', 'desc')
        ->get();

    $riwayatSelesai = Transaksi::with('detailPesanan.produk')
        ->where('user_id', Auth::id())
        ->where('status', 'selesai')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('pages.pesanan', compact('pesananAktif', 'riwayatSelesai'));
}



    public function selesaikan($id)
{
    $transaksi = Transaksi::where('id', $id)
        ->where('user_id', Auth::id())
        ->where('status', 'dikirim')
        ->firstOrFail();

    $transaksi->status = 'selesai';
    $transaksi->save();

    return redirect()->route('pesanan')->with('success', 'Pesanan telah selesai.');
}

public function riwayat()
{
    $pesanan = Transaksi::with('detailPesanan.produk')
        ->where('user_id', Auth::id())
        ->where('status', 'selesai')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('pages.riwayat_pesanan', compact('pesanan'));
}

public function invoice($id)
{
    $transaksi = Transaksi::with('detailPesanan.produk', 'user')
        ->where('user_id', Auth::id())
        ->where('id', $id)
        ->firstOrFail();

    return view('pages.invoice', compact('transaksi'));
}


}


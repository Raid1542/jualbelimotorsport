<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class AdminPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('user', 'detailPesanan.produk')->latest()->get();
        return view('pages.admin.pesanan', compact('pesanan'));
    }

    public function konfirmasi($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 'diproses';
        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan berhasil dikonfirmasi.');
    }

    public function ubahStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $request->status;

        if ($request->status === 'diperjalanan' && $request->filled('no_resi')) {
            $pesanan->no_resi = $request->no_resi;
        }

        $pesanan->save();

        return back()->with('success', 'Status pesanan diperbarui.');
    }
}

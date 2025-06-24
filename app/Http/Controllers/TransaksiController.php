<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function showPembayaran($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('pembayaran.qris', compact('transaksi'));
    }

    public function uploadBukti(Request $request, $id)
    {
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $transaksi = Transaksi::findOrFail($id);

        $filename = time() . '.' . $request->bukti_transfer->extension();
        $request->bukti_transfer->move(public_path('bukti'), $filename);

        $transaksi->bukti_transfer = $filename;
        $transaksi->status = 'menunggu verifikasi';
        $transaksi->save();

        return redirect()->route('dashboard')->with('success', 'Bukti transfer berhasil diunggah!');
    }
}

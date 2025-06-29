<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;

class AdminRekapController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with('detail.produk');

        // 🔍 Filter berdasarkan tanggal
        if ($request->filled('tanggal')) {
            $tanggal = Carbon::parse($request->tanggal)->toDateString();
            $query->whereDate('created_at', $tanggal);
        }

        // 🔍 Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 🔍 Filter metode pembayaran
        if ($request->filled('metode')) {
            $query->where('metode_pembayaran', $request->metode);
        }

        $transaksis = $query->latest()->get();

        return view('pages.admin.rekap-penjualan', compact('transaksis'));
    }

    // 📤 Export ke Excel (dummy / bisa dikembangkan dengan Laravel Excel)
    public function export()
    {
        // Simulasi redirect / response file Excel
        return back()->with('success', 'Fitur ekspor belum diimplementasikan.');
    }
}

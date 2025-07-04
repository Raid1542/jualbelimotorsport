<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Carbon\Carbon;

class AdminRekapController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesanan::with('detail.produk');

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

        $pesanan = $query->latest()->get();

        return view('pages.admin.rekap-penjualan', compact('pesanan'));
    }

    // 📤 Export ke Excel (dummy / bisa dikembangkan dengan Laravel Excel)
    public function export()
    {
        // Simulasi redirect / response file Excel
        return back()->with('success', 'Fitur ekspor belum diimplementasikan.');
    }
}

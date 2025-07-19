<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapPenjualanExport;


class AdminRekapController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesanan::with('detailPesanan.produk');

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
    public function export(Request $request)
{
    $query = Pesanan::with('detailPesanan.produk', 'user');

    if ($request->filled('tanggal')) {
        $tanggal = Carbon::parse($request->tanggal)->toDateString();
        $query->whereDate('created_at', $tanggal);
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('metode')) {
        $query->where('metode_pembayaran', $request->metode);
    }

    $pesanan = $query->latest()->get();

    return Excel::download(new RekapPenjualanExport($pesanan), 'rekap-penjualan.xlsx');
}

}

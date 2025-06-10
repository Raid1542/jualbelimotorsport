<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with('kategori');

        // Pencarian keyword
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', '%' . $keyword . '%')
                    ->orWhere('warna', 'like', '%' . $keyword . '%')
                    ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
                    ->orWhereHas('kategori', function ($q2) use ($keyword) {
                        $q2->where('nama', 'like', '%' . $keyword . '%');
                    });
            });
        }

        // Filter kategori
        $kategoriTersedia = Kategori::pluck('nama')->toArray();
        if ($request->has('kategori')) {
            $validKategori = array_intersect($request->kategori, $kategoriTersedia);
            $query->whereHas('kategori', function ($q) use ($validKategori) {
                $q->whereIn('nama', $validKategori);
            });
        }

        // Filter harga
        if ($request->filled('harga_min')) {
            $query->where('harga', '>=', $request->harga_min);
        }
        if ($request->filled('harga_max')) {
            $query->where('harga', '<=', $request->harga_max);
        }

        $produks = $query->paginate(12)->withQueryString(); // Agar filter tetap saat pindah halaman

        return view('pages.produk', compact('produks'));
    }

    public function show($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        return view('pages.detail', compact('produk'));
    }
}

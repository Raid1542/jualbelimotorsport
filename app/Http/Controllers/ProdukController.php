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

    // Filter kategori
    if ($request->has('kategori')) {
        $query->whereHas('kategori', function ($q) use ($request) {
            $q->whereIn('nama', $request->kategori);
        });
    }


    // Filter harga
    if ($request->filled('harga_min')) {
        $query->where('harga', '>=', $request->harga_min);
    }
    if ($request->filled('harga_max')) {
        $query->where('harga', '<=', $request->harga_max);
    }

    // Filter keyword
    if ($request->filled('keyword')) {
        $keyword = $request->keyword;
        $query->where(function ($q) use ($keyword) {
            $q->where('nama', 'like', "%$keyword%")
              ->orWhere('warna', 'like', "%$keyword%")
              ->orWhere('deskripsi', 'like', "%$keyword%")
              ->orWhereHas('kategori', function ($q2) use ($keyword) {
                  $q2->where('nama', 'like', "%$keyword%");
              });
        });
    }

    

    // Ambil produk
     $produks = $query->get();
    $kategoris = Kategori::all();

    return view('pages.produk', compact('produks', 'kategoris'));
}


    public function show($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        return view('pages.detail', compact('produk'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk dengan filter pencarian
     */
    public function index(Request $request)
    {
        $query = Produk::with('kategori');

        // Filter kategori (checkbox)
        if ($request->has('kategori')) {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->whereIn('nama', $request->kategori);
            });
        }

        // Filter harga minimum
        if ($request->filled('harga_min')) {
            $query->where('harga', '>=', $request->harga_min);
        }

        // Filter harga maksimum
        if ($request->filled('harga_max')) {
            $query->where('harga', '<=', $request->harga_max);
        }

        // Filter keyword pencarian (nama, warna, deskripsi, kategori)
       if ($request->filled('keyword')) {
    $keywords = explode(' ', $request->keyword); // Pisahkan jadi array
    $query->where(function ($q) use ($keywords) {
        foreach ($keywords as $word) {
            $q->orWhere('nama', 'like', "%$word%")
              ->orWhere('warna', 'like', "%$word%")
              ->orWhere('deskripsi', 'like', "%$word%")
              ->orWhereHas('kategori', function ($q2) use ($word) {
                  $q2->where('nama', 'like', "%$word%");
              });
        }
    });
}


        // Ambil hasil dan semua kategori untuk filter
        $produks = $query->get();
        $kategoris = Kategori::all();

        return view('pages.produk', compact('produks', 'kategoris'));
    }

    /**
     * Menampilkan detail produk berdasarkan ID
     */
    public function show($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        return view('pages.detail', compact('produk'));
    }
}

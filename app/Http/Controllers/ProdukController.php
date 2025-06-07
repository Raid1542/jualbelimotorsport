<?php

// app/Http/Controllers/ProdukController.php
namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
  public function index(Request $request)
{
    $query = Produk::query();

    $keyword = ''; // Definisikan default

    // Ambil keyword dari input
    if ($request->filled('keyword')) {
        $keyword = $request->keyword;
        $keywords = preg_split('/\s+/', $keyword);

        $query->where(function ($q) use ($keywords) {
            foreach ($keywords as $word) {
                $q->where(function ($subQ) use ($word) {
                    $subQ->orWhere('nama', 'like', "%$word%")
                         ->orWhere('kategori', 'like', "%$word%")
                         ->orWhere('warna', 'like', "%$word%")
                         ->orWhere('deskripsi', 'like', "%$word%");
                });
            }
        });
    }

    // Filter harga
    if ($request->filled('harga_min')) {
        $query->where('harga', '>=', $request->harga_min);
    }

    if ($request->filled('harga_max')) {
        $query->where('harga', '<=', $request->harga_max);
    }

    // Filter kategori checkbox
    if ($request->filled('kategori')) {
        $query->whereIn('kategori', $request->kategori);
    }

    $produks = $query->get();

    // ✅ Pastikan keyword selalu dikirim, kosong jika tidak ada input
    return view('pages.produk', [
        'produks' => $produks,
        'keyword' => $keyword,
    ]);
}


    // File: app/Http/Controllers/ProdukController.php

public function show($id)
{
    $produk = Produk::findOrFail($id);
    return view('pages.detail', compact('produk'));
}

}

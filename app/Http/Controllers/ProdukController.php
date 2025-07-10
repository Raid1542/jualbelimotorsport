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

        if ($request->has('kategori')) {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->whereIn('nama', $request->kategori);
            });
        }

        if ($request->filled('harga_min')) {
            $query->where('harga', '>=', $request->harga_min);
        }

    
        if ($request->filled('harga_max')) {
            $query->where('harga', '<=', $request->harga_max);
        }

if ($request->filled('keyword')) {
    $stopWords = ['yang', 'dengan', 'warna', 'adalah', 'produk', 'miniatur']; // tambahkan sesuai kebutuhan
    $keywords = array_filter(explode(' ', strtolower($request->keyword)), function ($word) use ($stopWords) {
        return !in_array($word, $stopWords);
    });

    $query->where(function ($q) use ($keywords) {
        foreach ($keywords as $word) {
            $q->where(function ($sub) use ($word) {
                $sub->whereRaw('LOWER(nama) LIKE ?', ["%{$word}%"])
                    ->orWhereRaw('LOWER(warna) LIKE ?', ["%{$word}%"])
                    ->orWhereRaw('LOWER(deskripsi) LIKE ?', ["%{$word}%"])
                    ->orWhereHas('kategori', function ($q2) use ($word) {
                        $q2->whereRaw('LOWER(nama) LIKE ?', ["%{$word}%"]);
                    });
            });
        }
    });
}



        $produks = $query->paginate(12)->appends($request->all());
        $kategoris = Kategori::all();

        return view('pages.produk', compact('produks', 'kategoris'));
    }

   
    public function show($id)
{
    $produk = Produk::with('kategori')->findOrFail($id);

    $produkLain = Produk::where('id', '!=', $id)
        ->latest()
        ->take(8)
        ->get();

    return view('pages.detail', compact('produk', 'produkLain'));
}

}

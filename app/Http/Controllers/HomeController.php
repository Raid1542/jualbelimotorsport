<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori; // pastikan model Kategori sudah ada

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Produk::query();

        if ($keyword) {
            $query->where('nama', 'like', '%' . $keyword . '%')
                  ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
                  ->orWhere('kategori', 'like', '%' . $keyword . '%'); // jika 'kategori' di tabel produk
        }

        $produkBaru = $query->latest()->limit(6)->get(); // sesuai dengan nama yang dipakai di Blade

        return view('pages.home', compact('produkBaru'));
    }

    public function show()
    {
        $produks = Produk::all();
        $kategoris = Kategori::all(); // ambil semua kategori dari tabel

        return view('pages.produk2', compact('produk', 'kategoris'));
    }

    public function redirectToHome()
    {
        return redirect()->route('home');
    }
}

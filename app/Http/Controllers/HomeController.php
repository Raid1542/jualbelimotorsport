<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // ✅ Hapus session ketika user kembali ke home
        session()->forget('produk_back_to');

        $keyword = $request->input('keyword');

        $query = Produk::query();

        if ($keyword) {
            $query->where('nama', 'like', '%' . $keyword . '%')
                  ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
                  ->orWhere('kategori', 'like', '%' . $keyword . '%'); // jika kategori di tabel produk
        }

        $produkBaru = $query->latest()->limit(8)->get();

        return view('pages.home', compact('produkBaru'));
    }

    public function show()
    {
        $produks = Produk::all();
        $kategoris = Kategori::all();

        return view('pages.produk', compact('produks', 'kategoris'));
    }

    public function redirectToHome()
    {
        return redirect()->route('home');
    }
}

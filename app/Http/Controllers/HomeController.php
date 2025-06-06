<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $keyword = $request->input('keyword');

    $query = Produk::query();

    if ($keyword) {
        $query->where('nama', 'like', '%' . $keyword . '%')
              ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
              ->orWhere('kategori', 'like', '%' . $keyword . '%'); // jika kategori di tabel produk
    }

    $produk = $query->limit(6)->get(); // Bisa ubah jumlah limit sesuai kebutuhan

  return view('pages.home', compact('produk'));


}


}
<?php

// app/Http/Controllers/Admin/ProdukController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produkList = Produk::all(); // ambil semua produk dari database
        return view('pages.admin.produk', compact('produkList'));
    }
}

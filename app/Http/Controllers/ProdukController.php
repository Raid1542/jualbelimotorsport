<?php

// app/Http/Controllers/ProdukController.php
namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('pages.produk', compact('produks'));
    }

    // File: app/Http/Controllers/ProdukController.php

public function detail($id)
{
    $produk = Produk::findOrFail($id);
    return view('pages.detail', compact('produk'));
}

}

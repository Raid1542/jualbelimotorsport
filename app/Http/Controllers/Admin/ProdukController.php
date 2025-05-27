<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        // Ambil data produk dari database atau model
        $produkList = [
            ['id' => 1, 'nama' => 'Produk 1', 'gambar' => 'Honda1.jpg', 'deskripsi' => 'Deskripsi produk 1', 'harga' => 100000, 'stok' => 10, 'warna' => 'Red', 'kategori' => 'Honda'],
            ['id' => 2, 'nama' => 'Produk 2', 'gambar' => 'Honda1.jpg', 'deskripsi' => 'Deskripsi produk 2', 'harga' => 200000, 'stok' => 15, 'warna' => 'Blue', 'kategori' => 'Kawasaki'],
        ];
        
        return view('pages.admin.produk', compact('produkList'));
    }

    public function create()
    {
        return view('pages.admin.produk.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan produk baru
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            // Tambahkan validasi lainnya jika perlu
        ]);

        // Simpan produk ke database (gunakan Model Produk)
        // Produk::create($validatedData);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }
}

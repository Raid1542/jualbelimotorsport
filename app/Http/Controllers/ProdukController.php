<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = [
            ['img' => '/images/Yamaha.jpg', 'nama' => 'Yamaha R15 V4', 'harga' => 'Rp 38.000.000'],
            ['img' => '/images/Honda.jpg', 'nama' => 'Honda CBR250RR', 'harga' => 'Rp 62.000.000'],
            ['img' => '/images/Ducati.jpg', 'nama' => 'Ducati Panigale V4', 'harga' => 'Rp 799.000.000'],
        ];

        return view('pages.produk', compact('produk'));
    }

    public function show($id)
    {
        // Simulasi produk (nanti bisa diganti dari database)
        $produk = [
            'id' => $id,
            'nama' => "Motor $id",
            'harga' => 15000000 + ($id * 1000000),
            'gambar' => "https://source.unsplash.com/400x300/?motorcycle&sig=$id",
            'deskripsi' => 'Ini adalah deskripsi lengkap untuk Motor ' . $id,
        ];

        return view('pages.detail', compact('produk'));
    }
}

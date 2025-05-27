<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function create()
    {
        return view('pages.admin.crud'); // tampilkan form input
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'warna' => 'required|string',
            'kategori' => 'required|string',
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $namaFile);
            $validated['gambar'] = $namaFile;
        }

        // Simpan ke database
        Produk::create($validated);

        return redirect('/admin/produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function index()
    {
        $produkList = \App\Models\Produk::all(); // Ambil semua data dari tabel produk
        return view('pages.admin.produk', compact('produkList')); // Pastikan path view-nya benar
    }

}

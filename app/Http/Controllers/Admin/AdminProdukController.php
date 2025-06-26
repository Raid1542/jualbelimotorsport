<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produkList = Produk::with('kategori')->get();
        return view('pages.admin.produk', compact('produkList'));
    }

    public function create()
    {
        $kategoriList = Kategori::all();

        return view('pages.admin.crud', [
            'produk' => null,
            'form_action' => route('admin.produk.store'),
            'form_method' => 'POST',
            'button_label' => 'Simpan Produk',
            'kategoriList' => $kategoriList,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'warna' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $namaFile);
            $validated['gambar'] = $namaFile;
        }

        Produk::create($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil disimpan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoriList = Kategori::all(); 

        return view('pages.admin.crud', [
            'produk' => $produk,
            'form_action' => route('admin.produk.update', $produk->id),
            'form_method' => 'PUT',
            'button_label' => 'Update Produk',
            'kategoriList' => $kategoriList,
        ]);
        
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'warna' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/'), $namaFile);
            $validated['gambar'] = $namaFile;
        }

        $produk->update($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && file_exists(public_path('images/' . $produk->gambar))) {
            unlink(public_path('images/' . $produk->gambar));
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}

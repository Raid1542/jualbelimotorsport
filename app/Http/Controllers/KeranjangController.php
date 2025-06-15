<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');
    }
    public function index()
    
    {
        $keranjang = Keranjang::with('produk')
            ->where('user_id', Auth::id())
            ->get();

        return view('pages.keranjang', compact('keranjang'));
    }

public function tambah($id)
{
    $user_id = Auth::id();

    if (!$user_id) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
    }

    $keranjang = \App\Models\Keranjang::firstOrCreate(
        ['user_id' => $user_id, 'produk_id' => $id],
        ['jumlah' => 1]
    );

    if (!$keranjang->wasRecentlyCreated) {
        $keranjang->increment('jumlah');
    }

    return redirect()->route('keranjang')->with('success', 'Produk ditambahkan ke keranjang');
}


    public function hapus($id)
    {
        Keranjang::where('id', $id)->where('user_id', Auth::id())->delete();
        return back()->with('success', 'Produk dihapus dari keranjang');
    }

    
}

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

        $keranjang = Keranjang::firstOrCreate(
            [
                'user_id' => $user_id,
                'produk_id' => $id
            ],
            [
                'jumlah' => 1
            ]
        );

        if (!$keranjang->wasRecentlyCreated) {
            $keranjang->increment('jumlah');
        }

        return redirect()->route('keranjang.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function tambahLangsung($keranjang_id)
    {
        $keranjang = Keranjang::where('id', $keranjang_id)
            ->where('user_id', Auth::id())
            ->first();

        if ($keranjang) {
            $keranjang->increment('jumlah');
        }

        return redirect()->route('keranjang.index')->with('success', 'Jumlah produk ditambahkan');
    }

    public function kurangi($keranjang_id)
    {
        $keranjang = Keranjang::where('id', $keranjang_id)
            ->where('user_id', Auth::id())
            ->first();

        if ($keranjang) {
            if ($keranjang->jumlah > 1) {
                $keranjang->decrement('jumlah');
            } else {
                $keranjang->delete();
            }
        }

        return redirect()->route('keranjang.index')->with('success', 'Jumlah produk dikurangi');
    }

    public function hapus($id)
    {
        Keranjang::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->route('keranjang.index')->with('success', 'Produk dihapus dari keranjang');
    }
}

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

   public function tambah(Request $request, $id)
{
    $user_id = Auth::id();
    $jumlahInput = (int) $request->input('jumlah', 1); // Ambil jumlah dari input form

    $keranjang = Keranjang::where('user_id', $user_id)
        ->where('produk_id', $id)
        ->first();

    if ($keranjang) {
        // Tambah jumlah yang dipilih
        $keranjang->jumlah += $jumlahInput;
        $keranjang->save();
    } else {
        // Buat baru dengan jumlah sesuai input
        Keranjang::create([
            'user_id' => $user_id,
            'produk_id' => $id,
            'jumlah' => $jumlahInput,
        ]);
    }

    return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
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

    public function destroy($id)
    {
        $item = Keranjang::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan.'], 404);
        }

        $item->delete();

        return response()->json(['success' => true]);
    }

    public function tambahJumlah($id)
{
    $keranjang = Keranjang::where('id', $id)
        ->where('user_id', Auth::id())
        ->first();

    if ($keranjang) {
        $keranjang->increment('jumlah');
    }

    return response()->json(['success' => true]);
}

public function kurangiJumlah($id)
{
    $keranjang = Keranjang::where('id', $id)
        ->where('user_id', Auth::id())
        ->first();

    if ($keranjang) {
        if ($keranjang->jumlah > 1) {
            $keranjang->decrement('jumlah');
        } else {
            $keranjang->delete();
        }
    }

    return response()->json(['success' => true]);
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class DashboardPembeliController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $produkTerbaru = Produk::latest()->take(6)->get(); // jika kamu mau pakai juga
        $produkUnggulan = Produk::where('unggulan', true)->take(4)->get();

        return view('pages.dashboard', [
            'user' => $user,
            'produkTerbaru' => $produkTerbaru,
            'produkUnggulan' => $produkUnggulan
        ]);
    }
}

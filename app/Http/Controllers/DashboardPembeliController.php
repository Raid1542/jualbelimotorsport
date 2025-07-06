<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Produk;

class DashboardPembeliController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Ambil 4 produk terbaru
        $produkBaru = Produk::orderBy('created_at', 'desc')->take(4)->get();

        // Ambil dan hapus 'show_welcome' hanya sekali saat ke dashboard
        $showWelcome = session()->pull('show_welcome', false);

        return view('pages.dashboard', [
            'user' => $user,
            'produkBaru' => $produkBaru,
            'show_welcome' => $showWelcome,
        ]);
    }
}

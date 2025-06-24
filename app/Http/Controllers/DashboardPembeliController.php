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
    $keyword = $request->input('keyword');
    $produkQuery = Produk::query();

    if ($keyword) {
        $produkQuery->where(function ($query) use ($keyword) {
            $query->where('nama', 'like', "%{$keyword}%")
                  ->orWhere('deskripsi', 'like', "%{$keyword}%");
        });
        $produkBaru = $produkQuery->get();
    } else {
        $produkBaru = $produkQuery->orderBy('created_at', 'desc')->take(4)->get();
    }

    // Ambil dan hapus session 'show_welcome' agar hanya muncul 1x
    $showWelcome = session()->pull('show_welcome', false);

    return view('pages.dashboard', [
        'user' => $user,
        'produkBaru' => $produkBaru,
        'searchQuery' => $keyword,
        'show_welcome' => $showWelcome
    ]);
}
}

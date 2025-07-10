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

        
        $produkBaru = Produk::orderBy('created_at', 'desc')->take(6)->get();

        
        $showWelcome = session()->pull('show_welcome', false);

        return view('pages.dashboard', [
            'user' => $user,
            'produkBaru' => $produkBaru,
            'show_welcome' => $showWelcome,
        ]);
    }
}

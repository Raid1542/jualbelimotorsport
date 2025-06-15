<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class DashboardPembeliController extends Controller
{
    public function index()
    {
        $user = Auth::user();

         $produkBaru = Produk::orderBy('created_at', 'desc')->take(4)->get();

        return view('pages.dashboard', [
            'user' => $user,
            'produkBaru' => $produkBaru,
        
        ]);
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('pages.konfirmasi_pembayaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'bukti_transfer' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('bukti_transfer')->store('bukti_transfer', 'public');

        return redirect()->route('dashboard')->with('success', 'Bukti pembayaran berhasil dikirim.');
    }
}

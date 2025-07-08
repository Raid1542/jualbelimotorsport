<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class KonfirmasiPembayaranController extends Controller
{
    public function index()
    {
    

        // Kirim data ke view
        return view('pages.admin.konfirmasi_pembayaran', compact('pembayaranList'));
    }
}

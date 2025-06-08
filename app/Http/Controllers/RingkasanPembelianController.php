<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RingkasanPembelianController extends Controller
{
    public function ringkasan() {
        return view('pages.ringkasan_pembelian');
    }
}

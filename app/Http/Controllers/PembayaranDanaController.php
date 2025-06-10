<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranDanaController extends Controller
{
    public function bayar() {
        return view('pages.pembayaran_dana');
    }
}

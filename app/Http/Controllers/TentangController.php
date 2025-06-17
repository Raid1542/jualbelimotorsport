<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TentangKami;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = TentangKami::first();
        return view('pages.tentang', compact('tentang'));
    }
}


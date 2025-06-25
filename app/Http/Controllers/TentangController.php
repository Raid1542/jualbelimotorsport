<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;

class TentangController extends Controller
{
    public function index()
    {
        $biodataList = TentangKami::all();
        return view('pages.tentang', compact('biodataList'));
    }
}

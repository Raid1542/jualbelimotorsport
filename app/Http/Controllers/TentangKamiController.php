<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TentangKami;

class TentangKamiController extends Controller
{
    public function show()
    {
        $data = TentangKami::first();
        return view('pages.tentang-kami', compact('data'));
    }
}



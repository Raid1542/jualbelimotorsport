<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil()
    {
        // logika fungsi profil
        return view('pages.profil');
    }
}

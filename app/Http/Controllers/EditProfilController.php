<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfilController extends Controller
{
    public function edit_profil() {
        return view('pages.edit_profil');
    }
}

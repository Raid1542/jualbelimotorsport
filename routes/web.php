<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('welcome');
});

# AUTENTIKASI #



# ADMIN #



# PEMBELI #

Route::get('/edit_profil', [EditProfilController::class, 'edit_profil'])->name('edit_profil');
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
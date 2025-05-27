<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KeranjangController;

Route::get('/', function () {
    return view('welcome');
});

# AUTENTIKASI #



# ADMIN #



# PEMBELI #

Route::get('/edit_profil', [EditProfilController::class, 'edit_profil'])->name('edit_profil');
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->name('keranjang');
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KeranjangController;

Route::get('/welcome', function () {
    return view('welcome');
});


// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



# ADMIN #



# PEMBELI #
// Halaman Edit Profil
Route::get('/edit_profil', [EditProfilController::class, 'edit_profil'])->name('edit_profil');

// Halaman Profil
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');


// Halaman Keranjang
Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->name('keranjang');

// halaman produk senbelum login
Route::middleware('auth')->group(function () {
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
});

// Halaman Home - bisa diakses semua orang
Route::get('/', function () {
    return view('pages.home'); // Sesuaikan dengan view yang kamu pakai
})->name('home');

// Halaman Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');

// Halaman Produk Detail
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.detail');

Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->name('keranjang');


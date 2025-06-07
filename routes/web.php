<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardPembeliController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KonfirmasiPembayaranController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Rute Umum (Bisa Diakses Semua)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/welcome', 'welcome');

/*
|--------------------------------------------------------------------------
| Rute Autentikasi
|--------------------------------------------------------------------------
*/


// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardPembeliController::class, 'index'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Rute Pembeli (Harus Login)
|--------------------------------------------------------------------------
*/

// Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

// ✅ Route yang butuh login
Route::middleware(['auth'])->group(function () {

    // 🔒 Profil (butuh login)
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil');
    Route::get('/edit_profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/update_profil', [ProfilController::class, 'update'])->name('profil.update');

    // 🔒 Keranjang (butuh login)
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::get('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
    Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');

    // 🔒 Checkout (butuh login)
    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/proses', [CheckoutController::class, 'proses'])->name('checkout.proses');
});



/*
|--------------------------------------------------------------------------
| Rute Admin (Prefix: /admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Riwayat transaksi & Rekap penjualan (hanya view)
    Route::view('/riwayat-transaksi', 'admin.riwayat-transaksi')->name('riwayat-transaksi');
    Route::view('/rekap-penjualan', 'pages.admin.rekap-penjualan')->name('rekap-penjualan');

    // Konfirmasi Pembayaran
    Route::get('/konfirmasi_pembayaran', [KonfirmasiPembayaranController::class, 'index'])->name('konfirmasi.index');

    // Produk (CRUD)
    Route::get('/produk', [AdminProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [AdminProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/store', [AdminProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}/edit', [AdminProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}/update', [AdminProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}/delete', [AdminProdukController::class, 'destroy'])->name('produk.destroy');
});
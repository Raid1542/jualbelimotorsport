<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardPembeliController;
use App\Http\Controllers\RingkasanPembeliController;
use App\Http\Controllers\PembayaranDanaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KonfirmasiPembayaranController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RingkasanPembelianController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\Admin\AdminTentangKamiController;
use App\Http\Controllers\PesananController;
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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardPembeliController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

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

    Route::get('/dashboard', [DashboardPembeliController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
    Route::get('/pesanan', [PesananController::class, 'index'])->middleware('auth')->name('pesanan');
    Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

    Route::get('/profil/password', [ProfilController::class, 'editPassword'])->name('profil.edit_password');
    Route::post('/profil/password', [ProfilController::class, 'updatePassword'])->name('profil.update_password');

    // 🔒 Keranjang (butuh login)
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
    Route::post('/keranjang/tambahlangsung/{id}', [KeranjangController::class, 'tambahLangsung'])->name('keranjang.tambahlangsung');
    Route::post('/keranjang/kurangi/{id}', [KeranjangController::class, 'kurangi'])->name('keranjang.kurangi');
    Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');

    // 🔒 Checkout (butuh login)
    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/pilih', [CheckoutController::class, 'pilih'])->name('checkout.pilih');
    Route::post('/checkout/proses', [CheckoutController::class, 'proses'])->name('checkout.proses');
});
/*
|--------------------------------------------------------------------------
| Rute Admin (Prefix: /admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

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

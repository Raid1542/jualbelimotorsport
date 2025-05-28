<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KonfirmasiPembayaranController;

Route::get('/welcome', function () {
    return view('welcome');
});

# AUTENTIKASI #

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



# ADMIN #
Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Riwayat transaksi
    Route::view('/riwayat-transaksi', 'admin.riwayat-transaksi')->name('admin.riwayat-transaksi');

    // Rekap penjualan
    Route::view('/rekap-penjualan', 'pages.admin.rekap-penjualan')->name('admin.rekap-penjualan');

    // Konfirmasi pembayaran
    Route::get('/konfirmasi_pembayaran', [KonfirmasiPembayaranController::class, 'index'])->name('admin.konfirmasi.index');

    // Produk (CRUD)
    Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk.index');      // Menampilkan daftar produk
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');   // Form tambah produk
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');     // Simpan produk

    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');    // Form edit produk
    Route::put('/produk/{id}/update', [ProdukController::class, 'update'])->name('produk.update'); // Update produk
    Route::delete('/produk/{id}/delete', [ProdukController::class, 'destroy'])->name('produk.destroy'); // Hapus produk
});

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

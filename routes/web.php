<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KonfirmasiPembayaranController;

Route::get('/', function () {
    return view('welcome');
});

# AUTENTIKASI #



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
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');   // Menampilkan form tambah produk
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');     // Menyimpan produk ke database
});

# PEMBELI #

Route::get('/edit_profil', [EditProfilController::class, 'edit_profil'])->name('edit_profil');
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->name('keranjang');

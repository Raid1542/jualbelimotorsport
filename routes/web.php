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
    Route::view('/dashboard', 'pages.admin.dashboard')->name('pages.admin.dashboard');
    Route::view('/riwayat-transaksi', 'admin.riwayat-transaksi')->name('admin.riwayat-transaksi');
    Route::view('/rekap-penjualan', 'pages.admin.rekap-penjualan')->name('admin.rekap-penjualan');
    Route::view('/konfirmasi_pembayaran', 'pages.admin.konfirmasi_pembayaran')->name('admin.konfirmasi_pembayaran');

    Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk.index');  // Menampilkan daftar produk
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('admin.produk.create');  // Menampilkan form tambah produk
    Route::post('/produk', [ProdukController::class, 'store'])->name('admin.produk.store');  // Menyimpan produk baru
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/konfirmasi_pembayaran', [KonfirmasiPembayaranController::class, 'index'])->name('admin.konfirmasi.index');
});


# PEMBELI #

Route::get('/edit_profil', [EditProfilController::class, 'edit_profil'])->name('edit_profil');
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->name('keranjang');
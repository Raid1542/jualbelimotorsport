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
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RingkasanPembelianController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ResiController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KonfirmasiPembayaranController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminTentangKamiController;
use App\Http\Controllers\Admin\AdminTransaksiController;
use App\Http\Controllers\Admin\AdminRekapController;
use App\Http\Controllers\Admin\AdminPesananController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\FavoritController;

Route::get('/bayar-motor', [CheckoutController::class, 'tampilkanFormBayar']); // Opsional
Route::post('/checkout/proses', [CheckoutController::class, 'prosesCheckout'])->name('checkout.proses');
Route::get('/checkout/sukses', [CheckoutController::class, 'sukses'])->name('checkout.sukses');

// Midtrans Integration
Route::post('/midtrans/token', [CheckoutController::class, 'getSnapToken'])->name('midtrans.token');
Route::post('/checkout/snap-token', [CheckoutController::class, 'getSnapToken'])->name('checkout.snap.token');
Route::post('/checkout/proses', [CheckoutController::class, 'prosesCheckout'])->name('checkout.proses');



/*
|--------------------------------------------------------------------------
| Rute Umum (Bisa Diakses Semua)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/welcome', 'welcome');

 Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

 Route::get('/reset-backto', function () {
    session()->forget('produk_back_to');
    return redirect()->route('home');
});


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
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');


/*
|--------------------------------------------------------------------------
| Rute Pembeli (Harus Login)
|--------------------------------------------------------------------------
*/


// ✅ Route yang butuh login
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardPembeliController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/search', [DashboardPembeliController::class, 'index'])->name('dashboard.search');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
    Route::get('/profil/password', [ProfilController::class, 'editPassword'])->name('profil.edit_password');
    Route::post('/profil/password', [ProfilController::class, 'updatePassword'])->name('profil.update_password');


    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');
    Route::get('/riwayat', [PesananController::class, 'riwayat'])->name('riwayat');
    Route::post('/pesanan/selesai/{id}', [PesananController::class, 'selesaikan'])->name('pesanan.selesai');
    Route::get('/invoice/{id}', [PesananController::class, 'invoice'])->name('pesanan.invoice');


    // 🔒 Keranjang (butuh login)
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/kurangi/{id}', [KeranjangController::class, 'kurangi'])->name('keranjang.kurangi');
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
    Route::post('/keranjang/tambahlangsung/{id}', [KeranjangController::class, 'tambahLangsung'])->name('keranjang.tambahlangsung');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
    Route::post('/keranjang/tambah-jumlah/{id}', [KeranjangController::class, 'tambahJumlah']);
    Route::post('/keranjang/kurangi-jumlah/{id}', [KeranjangController::class, 'kurangiJumlah']);


    // 🔒 Checkout (butuh login)
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/proses', [CheckoutController::class, 'prosesCheckout'])->name('checkout.proses');
    Route::post('/checkout/pilih', [CheckoutController::class, 'pilih'])->name('checkout.pilih');
    Route::post('/checkout/qris/konfirmasi/{id}', [CheckoutController::class, 'konfirmasiQris'])->name('checkout.qris.konfirmasi');
    Route::get('/checkout/qris/{id}', [CheckoutController::class, 'checkoutQris'])->name('checkout.qris');
    Route::get('/beli-sekarang/{id}', [CheckoutController::class, 'beliSekarang'])->name('checkout.beli');
    Route::get('/checkout/sukses', [CheckoutController::class, 'sukses'])->name('checkout.sukses');
    Route::post('/checkout/beli/{id}', [CheckoutController::class, 'beliSekarangPost'])->name('checkout.beli.post');


    Route::post('/konfirmasi/store', [PembayaranController::class, 'store'])->name('konfirmasi.store');
    Route::get('/konfirmasi-pembayaran', [PembayaranController::class, 'index'])->name('konfirmasi.index');
    Route::post('/konfirmasi-pembayaran', [PembayaranController::class, 'store'])->name('konfirmasi.store');



    Route::get('/resi', [ResiController::class, 'resi'])->middleware('auth')->name('resi');
    Route::get('/riwayat_pesanan', [PesananController::class, 'index'])->middleware('auth')->name('pesanan');


    

});


/*
|--------------------------------------------------------------------------
| Rute Admin (Prefix: /admin)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Rekap Penjualan
    Route::get('/rekap-penjualan', [AdminRekapController::class, 'index'])->name('rekap-penjualan');
    Route::get('/rekap-penjualan/export', [AdminRekapController::class, 'export'])->name('rekap-penjualan.export');

    // Produk (CRUD)
    Route::get('/produk', [AdminProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [AdminProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/store', [AdminProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}/edit', [AdminProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}/update', [AdminProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}/delete', [AdminProdukController::class, 'destroy'])->name('produk.destroy');

    // Tentang Kami
    Route::get('/tentang-kami', [AdminTentangKamiController::class, 'index'])->name('tentangkami.index');
    Route::get('/tentang-kami/create', [AdminTentangKamiController::class, 'create'])->name('tentangkami.create');
    Route::post('/tentang-kami', [AdminTentangKamiController::class, 'store'])->name('tentangkami.store');
    Route::get('/tentang-kami/{id}/edit', [AdminTentangKamiController::class, 'edit'])->name('tentangkami.edit');
    Route::put('/tentang-kami/{id}', [AdminTentangKamiController::class, 'update'])->name('tentangkami.update');
    Route::delete('/tentang-kami/{id}', [AdminTentangKamiController::class, 'destroy'])->name('tentangkami.destroy');

    Route::get('/pesanan', [AdminPesananController::class, 'index'])->name('pesanan');
    Route::post('/pesanan/{id}/konfirmasi', [AdminPesananController::class, 'konfirmasi'])->name('pesanan.konfirmasi');
    Route::post('/pesanan/{id}/proses', [AdminPesananController::class, 'proses'])->name('pesanan.proses');
    Route::post('/pesanan/{id}/kirim', [AdminPesananController::class, 'kirim'])->name('pesanan.kirim');
    Route::post('/pesanan/{id}/ubah-status', [AdminPesananController::class, 'ubahStatus'])->name('pesanan.ubah-status');
});
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Keranjang;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        
    }

   public function boot()
{
    View::composer('*', function ($view) {
        if (auth()->check()) {
            $keranjangDropdown = Keranjang::with('produk')
                ->where('user_id', auth()->id())
                ->latest()
                ->take(5)
                ->get();
            $jumlahKeranjang = Keranjang::where('user_id', auth()->id())->count();
        } else {
            $keranjangDropdown = collect();
            $jumlahKeranjang = 0;
        }

        $view->with(compact('keranjangDropdown', 'jumlahKeranjang'));
    });
}
}
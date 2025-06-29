<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekPenjualSession
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah session role == penjual
        if (session('role') !== 'penjual') {
            return redirect('/login')->withErrors([
                'username' => 'Silakan login sebagai penjual terlebih dahulu.'
            ]);
        }

        return $next($request);
    }
}

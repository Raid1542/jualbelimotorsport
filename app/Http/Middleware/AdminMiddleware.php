<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'penjual') {
            return $next($request);
        }

        // Jika bukan admin, redirect ke halaman lain, misal home user
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses admin');
    }
}

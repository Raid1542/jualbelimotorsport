<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetPreviousPage
{
    public function handle(Request $request, Closure $next)
    {
        // Simpan URL saat ini ke session
        session(['previous_page' => $request->fullUrl()]);
        return $next($request);
    }
}

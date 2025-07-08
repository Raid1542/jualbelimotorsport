<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClearWelcomeSession
{
    public function handle(Request $request, Closure $next)
    {

        if (!$request->is('dashboard')) {
            session()->forget('show_welcome');
        }

        return $next($request);
    }
}

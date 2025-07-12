<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SavePreviousUrl
{
    public function handle(Request $request, Closure $next)
    {

        if ($request->method() === 'GET' && !$request->ajax()) {
            if ($request->fullUrl() !== url()->previous()) {
                session(['previous_page' => url()->previous()]);
            }
        }

        return $next($request);
    }
}

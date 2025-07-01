<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Restaurant
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): RedirectResponse|Response
    {
        if (!Auth::check()) {
            return $request->is('/') ? to_route('masuk') : to_route('masuk')->withErrors(['errors' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
        }

        return $next($request);
    }
}
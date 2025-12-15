<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('jenis_produk.index')
                             ->with('error', 'Anda tidak punya akses.');
        }
        return $next($request);
    }
}

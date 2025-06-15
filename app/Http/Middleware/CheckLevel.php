<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLevel
{
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (!in_array(auth()->user()->level, $levels)) {
            return redirect('/'); // atau halaman error
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class StorePreviousUrl
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            session()->put('previousUrl', $request->url());
        }

        return $next($request);
    }
}

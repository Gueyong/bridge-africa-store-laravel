<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureSessionIsStarted
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->isStarted()) {
            $request->session()->start();
        }
        return $next($request);
    }
}
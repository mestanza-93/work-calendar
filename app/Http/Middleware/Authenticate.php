<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }

        return $next($request);
    }
}

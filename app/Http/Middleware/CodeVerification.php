<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CodeVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->code !== null) {
                return redirect()->route('code.verify');
            }
        }
        return $next($request);
    }
}

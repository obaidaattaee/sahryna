<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileVerification
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
            if (auth()->user()->code == null) {
                if (auth()->user()->payment_data == null) {
                    Alert::warning('يرجى توثيق الحساب لتتمكن من الاستفادة من خدمات الموقع') ;
                            return $next($request);

                }
            }
        }
        return $next($request);

    }
}

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
                if (auth()->user()->alternative_phone == null) {
                    dd(auth()->user());
                    Alert::info('يرجى  استكمال بياناتك الشخصية لتتمكن من  الاستفادة من خدمات الموقع') ;
                    return redirect()->route('my.profile.edit') ;
                }
            }
        }
        return $next($request);

    }
}

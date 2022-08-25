<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerAuthenticate
{


    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('customer')->check()) {
            return $next($request);
        }
        return redirect()->to('/')->withErrors(['msg' => 'Üye girişi yapmalısınız yada üye olmalısınız']);
    }


}

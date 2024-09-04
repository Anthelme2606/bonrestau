<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
class GuestPhone
{
    public function handle( Request $request, Closure $next):Response
    {
      
        if (Session::has('phone_verified')) {
            return redirect()->route('porte-f');
        }

        // $timestamp = Session::get('phone_verified_timestamp');
        // $expiresAt = $timestamp->addMinutes(10);

        // if (now()->greaterThan($expiresAt)) {
        //     Session::forget('phone_verified');
        //     Session::forget('phone_verified_timestamp');
        //     return redirect()->route('reseau.verify');
        // }

        return $next($request);
    }
}

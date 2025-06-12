<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return $next($request); // ✅ Allow admin
            }

            return redirect()->route('account.profile')->with('error', 'Access denied. Admins only.');
 // ❌ Not admin
        }

        return redirect('/account/login')->with('error', 'You must be logged in.'); // ❌ Not logged in
    }
}

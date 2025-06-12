<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Check if the request expects JSON (AJAX)
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized'
                ], 401);
            }

            // Otherwise, redirect to login
            return redirect()->route('account.login');
        }

        return $next($request);
    }
}

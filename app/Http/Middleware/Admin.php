<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('admin')->check()) {
            // redirect to named route 'admin_login' (ensure this route exists)
            return redirect()->route('admin_login')->with('error', 'You do not have permission to access this page');
        }
        return $next($request);
    }
}
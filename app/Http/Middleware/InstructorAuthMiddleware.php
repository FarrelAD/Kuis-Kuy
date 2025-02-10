<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class InstructorAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('instructor')->check()) {
            return redirect()
                ->route('home')
                ->with('title', 'Halaman terproteksi')
                ->with('message', 'Anda harus login terlebih dahulu!');
        }

        return $next($request);
    }
}

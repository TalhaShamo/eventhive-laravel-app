<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsOrganizer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response{
        // Check if the user is logged in AND their role is 'organizer'
        if (!auth()->check() || auth()->user()->role !== 'organizer') {
            // If not, abort the request with a 403 Forbidden error
            abort(403, 'Unauthorized Action');
        }

        // If they are an organizer, allow the request to proceed
        return $next($request);
    }
}

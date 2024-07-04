<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RateLimiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $executed = \Illuminate\Support\Facades\RateLimiter::attempt(
            'send-message:'.$request['name'],
            5,
            function() use($next,$request) {
            },
            10
        );
        if (! $executed) {
            return response()->json(['message'=>'Too many messages sent!']);
        }
        return $next($request);
    }
}

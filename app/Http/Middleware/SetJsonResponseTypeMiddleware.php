<?php

namespace App\Http\Middleware;

use Closure;

class SetJsonResponseTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (!$response->headers->has('Content-Type')) {
            $response->header('Content-Type', 'application/json');
        }

        return $response;
    }
}

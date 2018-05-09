<?php

namespace App\Http\Middleware;

use Closure;

class RefreshToken
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
        $request->offsetSet('grant_type', 'refresh_token');
        $request->offsetSet('client_id', '2');
        $request->offsetSet('client_secret', 'vVpZbzoWqZr8tp9PnNZYTpOFEq24NHBvsFC0VNVa');
        return $next($request);
    }
}

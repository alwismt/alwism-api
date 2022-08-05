<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $url = $request->getSchemeAndHttpHost();
        $cc = $request->header('cookie');
        if($url == env('SANCTUM_STATEFUL_DOMAINS')) {
            return $next($request);
        }
        // return $next($request);
        return response()->json("Cross-Origin Request Blocked: The Same Origin Policy disallows reading the remote at " . $request->url() . ". This can be fixed by moving the resource to the same domain or enabling CORS.", 422);
    }
}

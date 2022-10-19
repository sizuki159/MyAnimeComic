<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $arrRole = explode('|', $role);
        if(in_array($request->user()->role, $arrRole)) {
            return $next($request);
        }

        return abort(404);
    }
}

<?php

namespace MwSpace\Eshop\Http\Middleware;

class EshopAuth
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return auth()->guard('eshop')->check() ? $next($request) : abort(404);
    }
}

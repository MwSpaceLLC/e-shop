<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Middleware;

class EshopCookies
{
    /**
     * Handle the incoming request.
     *
     * Create cookies cart
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        if ($request->hasCookie('eshop-cart')) {
            return $next($request);
        }

        return ($next($request))->withCookie(cookie()->forever('eshop-cart', $request->getSession()->getId()));
    }
}

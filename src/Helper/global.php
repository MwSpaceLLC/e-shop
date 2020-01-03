<?php

if (!function_exists('eshop')) {
    /**
     * Elper for blade constructor
     * @return \MwSpace\Eshop\Model\Eshop
     */
    function eshop()
    {
        return new \MwSpace\Eshop\Model\Eshop();
    }
}

if (!function_exists('backend')) {
    /**
     * Get the route path e-shop admin.
     * @param null $path
     * @return string
     */
    function backend($path = null)
    {
        return is_null($path) ? route('eshop-backend') : route('eshop-backend') . "/$path";
    }
}

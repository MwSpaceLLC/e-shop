<?php

if (!function_exists('admin')) {
    /**
     * Get the available auth admin instance.
     * @return mixed
     */
    function admin()
    {
        return auth()->guard('eshop:admin')->user();
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

if (!function_exists('get_model')) {
    /**
     * Get the Class Model in Eshop
     * @param $class
     * @return string
     */
    function get_model($class)
    {
        return ucfirst(strtolower(str_replace('Eshop', '', basename(get_class($class)))));
    }
}

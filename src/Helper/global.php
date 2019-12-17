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

if (!function_exists('get_parent')) {
    /**
     * Get the Parent Model in Eshop
     * @param $class
     * @return string
     */
    function get_parent($model)
    {
        if ($id = request()->parent)
            return $model->find($id);
    }
}

if (!function_exists('loop_model')) {
    /**
     * Get the Collection order by index in Eshop
     * @param $model
     * @return mixed
     */
    function loop_model($model)
    {
        if (request()->parent)
            return $model->where('parent_id', request()->parent)->orderBy('index')->paginate(config('eshop.paginate'));

        return $model->orderBy('index')->paginate(config('eshop.paginate'));
    }
}

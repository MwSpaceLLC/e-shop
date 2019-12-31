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

if (!function_exists('eshop_path')) {
    /**
     * @param null $path
     * @return mixed
     */
    function eshop_path($path = null)
    {
        return __DIR__ . "/../../$path";
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

if (!function_exists('get_current')) {
    /**
     * Get the Current Model by request in Eshop
     * @return string
     */
    function get_current()
    {
        if ($id = request()->parent)
            return (\MwSpace\Eshop\Model\CategoryEshop::find(request()->parent))->find($id);
    }
}

if (!function_exists('eshop_img')) {
    /**
     * @param $path
     * @return string
     */
    function eshop_img($path)
    {
        return asset("vendor/eshop/drive/$path");
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

        if ($model instanceof \MwSpace\Eshop\Model\CategoryEshop)
            return $model->where('parent_id', null)->orderBy('index')->paginate(config('eshop.paginate'));


        if ($model instanceof \MwSpace\Eshop\Model\ProductEshop)
            return $model->orderBy('index')->paginate(config('eshop.paginate'));

        return $model->paginate(config('eshop.paginate'));
    }
}

if (!function_exists('recursive_parent')) {
    /**
     * Get the Collection order by index in Eshop
     * @param $model
     * @return mixed
     */
    function recursive_parent()
    {
        $loop = 0;
        $parent = [];
        $select = (\MwSpace\Eshop\Model\CategoryEshop::find(request()->parent))->parent()->first();

        do {
            if ($loop > 0)
                $select = $select->parent()->first();

            $parent[] = $select;
            $loop++;

        } while ($select !== null);

        return array_reverse(array_filter($parent));
    }
}

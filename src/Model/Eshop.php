<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Model;

/**
 * Class Eshop
 * @package MwSpace\Eshop\Model
 */
class Eshop
{

    /**
     * @return CategoryEshop
     */
    public function category()
    {
        return new CategoryEshop;
    }

    /**
     * @return ProductEshop
     */
    public function product()
    {
        return new ProductEshop;
    }

    /**
     * @return TaxEshop
     */
    public function tax()
    {
        return new TaxEshop;
    }

    /**
     * @param null $path
     * @return mixed
     */
    public static function path($path = null)
    {
        return eshop_path($path);
    }

    /**
     * @param $key
     * @return bool
     */
    public function config($key)
    {
        if ($config = ConfigEshop::where('key', $key)->first())
            return $config->value;

        return false;
    }

    /**
     * @param $name
     * @return bool
     */
    public function option($name)
    {
        if ($option = OptionEshop::where('name', $name)->first())
            return $option->bool;

        return false;
    }
}

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
     * @return CartEshop
     */
    public function cart()
    {
        return new CartEshop;
    }

    /**
     * @return PaymentEshop
     */
    public function payment()
    {
        return new PaymentEshop;
    }

    /**
     * @param null $path
     * @return mixed
     */
    public static function path($path = null)
    {
        return __DIR__ . "/../../$path";
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

    /**
     * @return EshopApi
     */
    public function api()
    {
        $api = new EshopApi();

//        dd($this->path('src/Api/*'));

        foreach (glob($this->path('src/Api/*')) as $file) {
            $name = str_replace('.md', '', basename($file));
            $api->$name = file_get_contents($file);
        }

        return $api;
    }

    /**
     * @return EshopRoute
     */
    public function route()
    {
        return new EshopRoute();
    }

    /**
     * @return EshopBlade
     */
    public function blade()
    {
        return new EshopBlade();
    }

    /**
     * @return EshopAuth
     */
    public function auth()
    {
        return new EshopAuth();
    }

    /**
     * @return AdminEshop
     */
    public function admin()
    {
        return new AdminEshop();
    }

    /**
     * @return UserEshop
     */
    public function user()
    {
        return new UserEshop();
    }

    /**
     * @return OrderEshop
     */
    public function order()
    {
        return new OrderEshop();
    }

}

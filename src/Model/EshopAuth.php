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
class EshopAuth extends \stdClass
{
    /**
     * @return mixed
     */
    public function admin()
    {
        return auth()->guard('eshop:admin')->user();
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return auth()->guard('eshop:user')->user();
    }
}

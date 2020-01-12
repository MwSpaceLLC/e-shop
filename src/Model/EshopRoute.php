<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Model;

use Illuminate\Support\Facades\Route;

/**
 * Class Eshop
 * @package MwSpace\Eshop\Model
 */
class EshopRoute extends \stdClass
{
    /**
     * @param $routename
     * @return bool
     */
    public function is($routename)
    {
        if (is_array($routename))
            return in_array(request()->route()->getName(), $routename);

        return request()->route()->getName() === $routename;
    }
}

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
     * @param $model
     * @return string
     */
    public function product($model)
    {
        return \backend("api/new/product/$model");
    }
}

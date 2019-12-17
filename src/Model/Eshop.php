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
    public $category;
    public $product;

    public function __construct()
    {
        return $this->category = new CategoryEshop();
        return $this->product = new ProductEshop();
    }
}

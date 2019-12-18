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
}

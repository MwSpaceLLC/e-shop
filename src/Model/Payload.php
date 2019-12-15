<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Model;

/**
 * Class Payload
 * @package MwSpace\Eshop\Model
 */
class Payload extends \stdClass
{
    /**
     * @return false|string
     */
    public function get()
    {
        return json_encode($this);
    }
}

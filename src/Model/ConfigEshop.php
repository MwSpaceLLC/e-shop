<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EshopConfig
 * @package MwSpace\Eshop\Model
 */
class ConfigEshop extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eshop_configurations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'value',
    ];
}

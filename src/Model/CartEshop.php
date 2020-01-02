<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 *
 * @property int $id
 * @property int $tax_id
 * @property int $parent_id
 * @property string|null $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @mixin \Eloquent
 */
class CartEshop extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eshop_carts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cart', 'user_id', 'product_id', 'payload'
    ];

    /**
     * @return mixed
     */
    public function payload()
    {
        return json_decode($this->payload);
    }

}

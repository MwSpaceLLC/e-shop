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
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @mixin \Eloquent
 */
class ProductEshop extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eshop_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'index', 'admin_id', 'category_id', 'tax_id', 'payload'
    ];

    public $insert = true;

    /**
     * @return mixed
     */
    public function payload()
    {
        return json_decode($this->payload);
    }

    /**
     * @return mixed
     */
    public function categories()
    {
        return json_decode($this->category_id);
    }

    /**
     * Get Image Of Product
     * @return string
     */
    public function image()
    {
        if (isset($this->payload()->image))
            return asset("vendor/eshop/drive/{$this->payload()->image}");

        return asset("vendor/eshop/assets/img/file.png");
    }

}

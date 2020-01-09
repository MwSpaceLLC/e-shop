<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property string|null $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @mixin \Eloquent
 */
class TaxEshop extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eshop_taxes';

    public $insert = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payload',
    ];

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
    public function product()
    {
        return $this->hasMany(ProductEshop::class, 'tax_id');
    }

    /**
     * @return mixed
     */
    public function service()
    {
        return $this->hasMany(ServiceEshop::class, 'tax_id');
    }

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->hasMany(CategoryEshop::class, 'tax_id');
    }

    /**
     * @param $payload
     * @return |null
     */
    public function getPayload($payload)
    {
        if (!isset($this->payload()->$payload))
            return null;

        return $this->payload()->$payload;
    }
}

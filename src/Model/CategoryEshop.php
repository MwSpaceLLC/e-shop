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
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 * @property int $id
 * @property int $tax_id
 * @property string|null $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @mixin \Eloquent
 */
class CategoryEshop extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eshop_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'index', 'admin_id', 'tax_id', 'payload'
    ];

    public $insert = true;

    /**
     * @return mixed
     */
    public function payload()
    {
        return json_decode($this->payload);
    }

    public function product()
    {
        return $this->hasMany(ProductEshop::class, 'category_id');
    }

    /**
     * Get Image Of Product
     * @return string
     */
    public function image()
    {
        if (isset($this->payload()->image))
            return Storage::disk(config('e-shop.disk'))->url($this->payload()->image);

        return asset("vendor/eshop/assets/img/file.png");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media()
    {
        return $this->hasMany(MediaEshop::class, 'category_id');
    }

    /**
     * @param $payload
     * @return string|string[]|null
     */
    public function friendly($payload)
    {
        return preg_replace('/\s+/', '-', $payload);
    }

    /**
     * @return mixed
     */
    public function tax()
    {
        return $this->belongsTo(TaxEshop::class, 'tax_id');
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

<?php

namespace MwSpace\Eshop\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductEshop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductEshop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductEshop query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductEshop whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductEshop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductEshop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductEshop wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductEshop whereUpdatedAt($value)
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
        'payload',
    ];
}

<?php

namespace MwSpace\Eshop\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property int $id
 * @property int $parent_id
 * @property string|null $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryEshop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryEshop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryEshop query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryEshop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryEshop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryEshop whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryEshop wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CategoryEshop whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CategoryEshop extends Model
{
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
        'payload',
    ];
}

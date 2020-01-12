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
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

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
class MediaEshop extends Model
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('index');
        });
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eshop_medias';

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

    public function path()
    {
        if (!isset($this->payload()->path))
            return url('vendor/eshop/assets/img/photo.png');

        return Storage::disk(config('e-shop.disk'))->url($this->payload()->path);
    }

    /**
     * @param null $direction
     * @return \Illuminate\Database\Query\Builder
     */
    public function indexes($direction = null)
    {
        return $this->orderBy('index', $direction ?? 'asc');
    }
}

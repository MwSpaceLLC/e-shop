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
 * @property int $user_id
 * @property int $product_id
 * @property string|null $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @mixin \Eloquent
 */
class MediaEshop extends Model
{
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
}

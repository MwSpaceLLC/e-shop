<?php

namespace MwSpace\Eshop\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property string|null $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PaymentEshop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PaymentEshop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PaymentEshop query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PaymentEshop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PaymentEshop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PaymentEshop wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PaymentEshop whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PaymentEshop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PaymentEshop whereUserId($value)
 * @mixin \Eloquent
 */
class PaymentEshop extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eshop_payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payload',
    ];
}

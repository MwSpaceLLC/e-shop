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
use Illuminate\Database\Eloquent\Builder;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(CategoryEshop::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media()
    {
        return $this->hasMany(MediaEshop::class, 'product_id');
    }

    /**
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function image()
    {
        if (isset($this->payload()->image))
            return Storage::disk(config('e-shop.disk'))->url($this->payload()->image);

        return asset("vendor/eshop/assets/img/file.png");
    }

    /**
     * @param $payload
     * @return string|string[]|null
     */
    public function friendly($payload)
    {
        return preg_replace('/\s+/', '-', $payload);
    }

    public function cart()
    {
        return CartEshop::where('product_id', $this->id)->first();
    }

    /**
     * @throws EshopException
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function stripeAmount()
    {

        $price = str_replace(',', '', $this->payload()->price);
        return intval($price);

    }

    /**
     * @return \Stripe\Checkout\Session
     * @throws EshopException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function stripeGenerateExpressCart()
    {

        if (!eshop()->config('STRIPE_SK') || !eshop()->config('STRIPE_PAYMENT_METHODS'))
            throw new EshopException('Stripe Key required for Express Checkout');

        \Stripe\Stripe::setApiKey(eshop()->config('STRIPE_SK'));

        $price = str_replace(',', '', $this->payload()->price);
        $price = intval($price);

        return \Stripe\Checkout\Session::create([
            'success_url' => route('eshop-stripe-success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('eshop-stripe-cancel'),
            'payment_method_types' => json_decode(eshop()->config('STRIPE_PAYMENT_METHODS')),
            'line_items' => [
                [
                    'name' => $this->payload()->name,
                    'description' => $this->payload()->info,
                    'images' => [$this->image()],
                    'amount' => $price,
                    'currency' => strtolower(eshop()->config('SHOP_CURRENCY')),
                    'quantity' => 1,
                ],
            ],
        ]);

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

    /**
     * @param null $direction
     * @return \Illuminate\Database\Query\Builder
     */
    public function indexes($direction = null)
    {
        return $this->orderBy('index', $direction ?? 'asc');
    }

}

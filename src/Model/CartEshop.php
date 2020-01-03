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

    /**
     * @return mixed
     */
    public function this()
    {
        return $this->where('cart', request()->cookie('eshop-cart'));
    }

    /**
     * @return mixed
     */
    public function product()
    {
        return ProductEshop::where('id', $this->product_id)->first();
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

        if (!$this->this()->first())
            throw new EshopException('Cart is empty to perform Express Checkout');

        return \Stripe\Checkout\Session::create([
            'success_url' => route('eshop-stripe-success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('eshop-stripe-cancel'),
            'payment_method_types' => json_decode(eshop()->config('STRIPE_PAYMENT_METHODS')),
            'line_items' => $this->this()->get()->map(function ($cart) {
                return [
                    'name' => $cart->product()->payload()->name,
                    'description' => $cart->product()->payload()->info,
                    'images' => [$cart->product()->image()],
                    'amount' => $cart->product()->stripeAmount(),
                    'currency' => strtolower(eshop()->config('SHOP_CURRENCY')),
                    'quantity' => 1,
                ];
            })->toArray()
        ]);

    }


}

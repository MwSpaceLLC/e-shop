<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MwSpace\Eshop\Model\CategoryEshop;
use MwSpace\Eshop\Model\ConfigEshop;
use MwSpace\Eshop\Model\EshopException;
use MwSpace\Eshop\Model\OptionEshop;
use MwSpace\Eshop\Model\ProductEshop;

/**
 * Class ApiController
 * @package MwSpace\Eshop\Http\Controller
 */
class ApiController extends Base
{
    /**
     * Create e-shop user {eshop_users}
     */
    function newUser()
    {
        $this->request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
    }

    /**
     * Auth instance user {eshop_users}
     */
    function authUser()
    {
        $this->request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
    }

    /**
     * Create e-shop payment {eshop_payments}
     */
    function newPayment()
    {
        $this->request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
    }

    /**
     * Create e-shop cart session {eshop_carts}
     */
    function newProductCart()
    {
        $this->request->validate([
            'id' => 'required|exists:eshop_products|max:255',
        ]);

        if (!$this->request->hasCookie('eshop-cart'))
            return back()->with('error');

        $product = ProductEshop::findOrFail($this->request->id);

        eshop()->cart()->create([
            'cart' => $this->request->cookie('eshop-cart'),
            'user_id' => \auth()->guard('eshop:user')->id(),
            'product_id' => $product->id,
            'payload' => json_encode([
                $this->request->payload
            ]),
        ]);

        return back()->with('success');
    }


    /**
     * Delete e-shop cart session {eshop_carts}
     */
    function deleteProductCart()
    {
        eshop()->cart()->findOrFail($this->request->id)->delete();

        return back()->with('success');
    }

    /**
     * Express e-shop cart function {eshop_payments,eshop_products + Stripe Express}
     */
    public function expressCheckout()
    {
        $product = ProductEshop::findOrFail($this->request->id);

        return view('eshop::cart.expressProduct')->with('stripe', $product->stripeGenerateExpressCart());
    }

    /**
     * Express e-shop cart function {eshop_payments,eshop_products + Stripe Express}
     */
    public function expressProductCheckout()
    {
        $product = ProductEshop::findOrFail($this->request->id);

        return view('eshop::cart.expressProduct')->with('stripe', $product->stripeGenerateExpressProductCart());
    }

    public function checkoutSuccess()
    {

    }

    public function checkoutCancel()
    {

    }

}

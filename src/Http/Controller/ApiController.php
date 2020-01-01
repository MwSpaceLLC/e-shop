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
}

<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller\Login;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use MwSpace\Eshop\Mail\AdminLogin;
use MwSpace\Eshop\Model\AdminEshop;
use Illuminate\Support\Facades\Mail;
use \MwSpace\Eshop\Http\Controller\BaseController as Base;

/**
 * Class ViewController
 * @package MwSpace\Eshop\Http\Controller\Login
 */
class ViewController extends Base
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        return view('eshop::login.index');
    }
}

<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller\Event;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use MwSpace\Eshop\Mail\AdminLogin;
use MwSpace\Eshop\Model\AdminEshop;
use Illuminate\Support\Facades\Mail;
use \MwSpace\Eshop\Http\Controller\BaseController as Base;

/**
 * Class LogoutController
 * @package MwSpace\Eshop\Http\Controller\Event
 */
class AdminLogoutController extends Base
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        Auth::guard('eshop:admin')->logout();
        return back()->with(['success' => 'Disconnessione riuscita!']);
    }
}

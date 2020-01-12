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
 * Class TokenController
 * @package MwSpace\Eshop\Http\Controller\Login
 */
class TokenController extends Base
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        $admin = AdminEshop::where('token', $this->request->token)->firstOrFail();

        Auth::guard('eshop:admin')->login($admin);

        return redirect()->route('eshop-backend')->with(['success' => 'Felici di rivederti!']);
    }

}

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

class PostController extends Base
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.

        if (!AdminEshop::where('email', $this->request->email)->first())
            return back()->withErrors(['email' => 'Amministratore non trovato']);

        $this->silentAdminToken();

        return back()->with(['success' => 'Il token è stato inviato per e-mail!']);

    }
}

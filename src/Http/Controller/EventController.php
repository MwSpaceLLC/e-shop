<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use MwSpace\Eshop\Mail\AdminLogin;
use MwSpace\Eshop\Model\AdminEshop;
use Illuminate\Support\Facades\Mail;

class EventController extends BaseController
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('eshop')->logout();
        return response()->json('success', 200);
    }

    /**
     * Display the e-shop view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('eshop::app');
    }

    /**
     * Display the e-shop view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function login()
    {
        return view('eshop::login');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin()
    {
        $this->request->validate([
            'email' => 'email|required|exists:eshop_admins|max:255',
        ]);

        $this->silentAdminToken($this->request->email);

        return back()->with(['success' => 'Token has been sent to email!']);

    }

    /**
     * @param $email
     */
    private function silentAdminToken($email)
    {
        Mail::to($email)->later(1, new AdminLogin($email));
    }
}

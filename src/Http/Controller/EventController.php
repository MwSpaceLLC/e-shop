<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller;

use Illuminate\Support\Facades\Auth;
use MwSpace\Eshop\Mail\AdminLogin;
use MwSpace\Eshop\Model\AdminEshop;
use Illuminate\Support\Facades\Mail;

class EventController extends Base
{

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
        if (!AdminEshop::where('payload->email', $this->request->email)->first())
            return back()->withErrors(['email' => 'Email admin not found']);

        $this->silentAdminToken($this->request->email);

        return back()->with(['success' => 'Token has been sent to email!']);

    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function auth()
    {
        $admin = AdminEshop::where('payload->token', $this->request->token)->firstOrFail();

        Auth::guard('eshop:admin')->login($admin);

        return redirect()->route('eshop-backend')->with('Welcome Back!');
    }

    /**
     * @param $email
     */
    private function silentAdminToken($email)
    {
//        Mail::to($email)->send(new AdminLogin($email));
        Mail::to($email)->later(1, new AdminLogin($email));
    }
}

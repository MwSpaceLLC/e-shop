<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use MwSpace\Eshop\Mail\AdminLogin;


/**
 * Class Controller
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var Request $request
     */
    public $request;

    /**
     * @var Storage
     */
    public $storage;

    /**
     * Controller constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->storage = Storage::disk(config('e-shop.disk'));
    }

    /**
     * @return mixed
     */
    protected function silentAdminToken()
    {
        return Mail::to($this->request->email)->send(new AdminLogin($this->request->email));
    }

}

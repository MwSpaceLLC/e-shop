<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller\Backend\Page;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use MwSpace\Eshop\Model\CategoryEshop;
use MwSpace\Eshop\Model\ConfigEshop;
use MwSpace\Eshop\Model\OptionEshop;
use MwSpace\Eshop\Model\ProductEshop;
use MwSpace\Eshop\Model\ServiceEshop;
use \MwSpace\Eshop\Http\Controller\BaseController as Base;

/**
 * Class UpdateController
 * @package MwSpace\Eshop\Http\Controller\Backend\Config
 */
class ViewController extends Base
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __invoke()
    {
        if ($this->request->page) {
            if (!file_exists(eshop()->path("resources/views/backend/pages/{$this->request->page}.blade.php")))
                return abort('404');

            return view("eshop::backend.pages.{$this->request->page}");
        }

        return view('eshop::backend.pages.dashboard');
    }
}

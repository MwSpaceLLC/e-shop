<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller\Backend\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use MwSpace\Eshop\Model\CategoryEshop;
use MwSpace\Eshop\Model\ConfigEshop;
use MwSpace\Eshop\Model\OptionEshop;
use MwSpace\Eshop\Model\ProductEshop;
use MwSpace\Eshop\Model\ServiceEshop;
use \MwSpace\Eshop\Http\Controller\BaseController as Base;

/**
 * Class ViewController
 * @package MwSpace\Eshop\Http\Controller\Backend\Option
 */
class EditCategoryController extends Base
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function __invoke()
    {
        $this->model = CategoryEshop::findOrFail($this->request->id);

        if ($this->request->page) {
            if (!file_exists(eshop()->path("resources/views/backend/pages/category/{$this->request->page}.blade.php")))
                return abort(404);

            return view("eshop::backend.pages.category.{$this->request->page}")->with('category', $this->model);
        }

        return view("eshop::backend.pages.category.index")->with('category', $this->model);

    }

}

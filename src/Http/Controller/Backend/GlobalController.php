<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use MwSpace\Eshop\Model\CategoryEshop;
use MwSpace\Eshop\Model\ConfigEshop;
use MwSpace\Eshop\Model\OptionEshop;
use MwSpace\Eshop\Model\ProductEshop;
use MwSpace\Eshop\Model\ServiceEshop;
use \MwSpace\Eshop\Http\Controller\BaseController as Base;

class GlobalController extends Base
{

    /**
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return isset($this->request->page) ? view("eshop::backend.pages.{$this->request->page}") : view('eshop::backend.pages.dashboard');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteModel()
    {
        $model = ($this->newModel())::findOrFail($this->request->id);

        $this->checkModelBeforeDelete($model);

        $name = $model->payload()->name ?? '';
        $model->delete();

        return back()->with('success', "$name | has been deleted succesfull!");
    }

    public function removeImageModel()
    {
        $this->model = ($this->newModel())::findOrFail($this->request->current);

        $this->model->payload = $this->removeFromPayload('image');

        $this->model->save();

        return back()->with('success', "Image has been deleted succesfull!");
    }

}

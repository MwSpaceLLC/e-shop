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
use MwSpace\Eshop\Model\MediaEshop;
use MwSpace\Eshop\Model\OptionEshop;
use MwSpace\Eshop\Model\ProductEshop;
use MwSpace\Eshop\Model\ServiceEshop;
use \MwSpace\Eshop\Http\Controller\BaseController as Base;
use MwSpace\Eshop\Model\TaxEshop;

/**
 * Class InsertController
 * @package MwSpace\Eshop\Http\Controller\Backend\Option
 */
class InsertController extends Base
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        $this->model = $this->newModel();

        if (
            $this->model instanceof CategoryEshop ||
            $this->model instanceof ServiceEshop ||
            $this->model instanceof ProductEshop ||
            $this->model instanceof MediaEshop
        )
            $this->model->index = $this->model->count() + 1;

        if ($this->model instanceof CategoryEshop)
            $this->model->tax_id = $this->request->tax_id ?? null;

        $this->model->admin_id = eshop()->auth()->admin()->id;

        $this->model->payload = json_encode($this->request->payload);

        $this->model->save();

        return back()->with('success', "record ({$this->model->payload()->name}) inserito con successo!");
    }

}

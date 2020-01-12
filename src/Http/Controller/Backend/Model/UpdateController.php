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
 * Class UpdateController
 * @package MwSpace\Eshop\Http\Controller\Backend\Option
 */
class UpdateController extends Base
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        $this->model = $this->findModel();

        if ($this->request->tax_id)
            $this->model->tax_id = $this->request->tax_id;

        if ($this->request->category_id)
            $this->model->category_id = $this->request->category_id;

        // Mount Static Data in to index
        foreach ($this->request->payload as $key => $payload) {
            $this->model->$key = $payload;
        }

        $this->model->save();

        return back()->with('success','Record aggiornato correttamente');

    }

}

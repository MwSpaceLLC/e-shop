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

        if ($this->model instanceof CategoryEshop)
            $this->model->tax_id = $this->request->tax_id ?? $this->model->tax_id;

        if ($this->model instanceof ProductEshop)
            $this->model->category_id = $this->request->category_id ?? $this->model->category_id;

        if ($this->model instanceof MediaEshop) {

            dd($this->request->payload);

            if ($this->request->payload['path'] instanceof \Illuminate\Http\UploadedFile)
                $this->request->payload = array_merge($this->request->payload, ['path' => $this->storage->put("media", $this->request->payload['path'])]);

            $this->model->admin_id = eshop()->auth()->admin()->id;
            $this->model->service_id = $this->request->service_id ?? $this->model->service_id;
            $this->model->product_id = $this->request->product_id ?? $this->model->product_id;
            $this->model->category_id = $this->request->category_id ?? $this->model->category_id;
        }

        $this->model->payload = array_merge(json_decode($this->model->payload, true), $this->request->payload);

        $this->model->save();

        return back()->with('success', "Il modello è stato aggiornato con successo!");

    }

}

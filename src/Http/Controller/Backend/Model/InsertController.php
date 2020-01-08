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
use MwSpace\Eshop\Model\CartEshop;
use MwSpace\Eshop\Model\CategoryEshop;
use MwSpace\Eshop\Model\ConfigEshop;
use MwSpace\Eshop\Model\MediaEshop;
use MwSpace\Eshop\Model\OptionEshop;
use MwSpace\Eshop\Model\OrderEshop;
use MwSpace\Eshop\Model\PaymentEshop;
use MwSpace\Eshop\Model\ProductEshop;
use MwSpace\Eshop\Model\ServiceEshop;
use \MwSpace\Eshop\Http\Controller\BaseController as Base;
use MwSpace\Eshop\Model\ShippingEshop;
use MwSpace\Eshop\Model\TaxEshop;
use MwSpace\Eshop\Model\UserEshop;

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

        if ($this->model instanceof ProductEshop)
            $this->model->category_id = $this->request->category_id ?? null;

        if ($this->model instanceof MediaEshop) {

            if ($this->request->payload['path'] instanceof \Illuminate\Http\UploadedFile)
                $this->request->payload = array_merge($this->request->payload, ['path' => $this->storage->put("media", $this->request->payload['path'])]);

            $this->model->admin_id = eshop()->auth()->admin()->id;
            $this->model->service_id = $this->request->service_id ?? null;
            $this->model->product_id = $this->request->product_id ?? null;
            $this->model->category_id = $this->request->category_id ?? null;
        }

        if (
            !$this->model instanceof PaymentEshop ||
            !$this->model instanceof ConfigEshop ||
            !$this->model instanceof OptionEshop ||
            !$this->model instanceof OrderEshop ||
            !$this->model instanceof CartEshop ||
            !$this->model instanceof UserEshop ||
            !$this->model instanceof ShippingEshop
        )
            $this->model->admin_id = eshop()->auth()->admin()->id;

        $this->model->payload = json_encode($this->request->payload);

        $this->model->save();

        return back()->with('success', "record inserito con successo!");
    }

}

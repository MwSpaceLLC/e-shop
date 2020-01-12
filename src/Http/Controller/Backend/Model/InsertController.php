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
use Illuminate\Support\Facades\Schema;

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

        if (Schema::hasColumn($this->model->getTable(), 'admin_id'))
            $this->model->admin_id = eshop()->auth()->admin()->id;

        if (Schema::hasColumn($this->model->getTable(), 'index'))
            $this->model->index = $this->model->count() + 1;

        if ($this->request->tax_id)
            $this->model->tax_id = $this->request->tax_id;

        if ($this->request->category_id)
            $this->model->category_id = $this->request->category_id;

        if ($this->request->service_id)
            $this->model->service_id = $this->request->service_id;

        if ($this->request->product_id)
            $this->model->product_id = $this->request->product_id;

        if ($this->model instanceof MediaEshop)
            if ($this->request->payload['path'] instanceof \Illuminate\Http\UploadedFile)
                $this->request->payload = array_merge($this->request->payload, ['path' => $this->storage->put("media", $this->request->payload['path'])]);

        // Mount Static Data in to index
        foreach ($this->request->payload as $key => $payload) {
            $this->model->$key = $payload;
        }

        $this->model->save();

        return back()->with('success','Record inserito correttamente');
    }

}

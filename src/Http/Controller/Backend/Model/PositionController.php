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
 * Class DeleteController
 * @package MwSpace\Eshop\Http\Controller\Backend\Option
 */
class PositionController extends Base
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function __invoke()
    {

        foreach ($this->request->indexes as $index => $id) {
            $this->model = ($this->newModel())::findOrFail($id);
            $this->model->index = $index;
            $this->model->save();
        }

        return response()->json(['success' => "Il modello è stato eliminato!"]);
    }

}

<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller\Backend\Option;

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
        if (!$option = OptionEshop::where('name', $this->request->name)->first())
            $option = new OptionEshop();

        if (!$option->name)
            $option->name = $this->request->name;

        $option->bool = !(bool)$option->bool;

        if (null === $option->bool)
            $option->bool = false;

//        dd($option->bool);

        $option->save();

        return back()->with('success', "{$option->name} | has been updated succesfull!");
    }
}

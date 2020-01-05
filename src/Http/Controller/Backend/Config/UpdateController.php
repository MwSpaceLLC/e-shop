<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller\Backend\Config;

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
class UpdateController extends Base
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __invoke()
    {
        foreach ($this->request->keys as $key => $value) {
            if (!$config = ConfigEshop::where('key', $key)->first())
                $config = new ConfigEshop();

            if (!$config->key)
                $config->key = $key;

            // override file if instance of Uploader
            if ($value instanceof \illuminate\http\UploadedFile) {
                $config->value = $value->get();

            } else $config->value = is_array($value) ? json_encode($value) : $value;

//            dd($config);

            $config->save();
        }

        return back()->with('success', "{$config->key} | has been updated succesfull!");
    }
}

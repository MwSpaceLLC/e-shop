<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Model;

use Illuminate\Support\Facades\Route;

/**
 * Class Eshop
 * @package MwSpace\Eshop\Model
 */
class EshopBlade extends \stdClass
{

    /**
     * Get name of Model
     * @param $model
     * @return string
     */
    public function model($model)
    {
        return ucfirst(strtolower(str_replace('Eshop', '', basename(get_class($model)))));
    }

    /**
     * Get current by Parent of Model
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|CategoryEshop|CategoryEshop[]|null
     * @throws EshopException
     */
    public function current($model)
    {
        if (!$r = request())
            throw new EshopException('Request not set');

        return $model::find(request()->parent);
    }

    /**
     * Get loop of Model
     * @param $model
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function loop($model)
    {

        if ($model instanceof \MwSpace\Eshop\Model\CategoryEshop) {
            if (request()->parent)
                return $model->where('parent_id', request()->parent)->orderBy('index')->simplePaginate(config('e-shop.paginate'));

            return $model->where('parent_id', null)->orderBy('index')->simplePaginate(config('e-shop.paginate'));
        }

        if ($model instanceof \MwSpace\Eshop\Model\ProductEshop)
            return $model->orderBy('index')->simplePaginate(config('e-shop.paginate'));

        if ($model instanceof \MwSpace\Eshop\Model\ServiceEshop)
            return $model->orderBy('index')->simplePaginate(config('e-shop.paginate'));

        return $model->simplePaginate(config('e-shop.paginate'));
    }

}

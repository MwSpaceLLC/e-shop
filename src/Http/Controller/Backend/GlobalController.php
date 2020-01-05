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
     * @var Model
     */
    private $model;

    /**
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return isset($this->request->page) ? view("eshop::backend.pages.{$this->request->page}") : view('eshop::backend.pages.dashboard');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexApi()
    {
        return isset($this->request->page) ? view("eshop::backend.api.index") : view('eshop::backend.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexApiStatic()
    {
        return isset($this->request->page) ? view("eshop::backend.api.{$this->request->page}") : view('eshop::backend.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function models()
    {
        return view("eshop::backend.model.index")->with('model', $this->getModel());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function parentModels()
    {
        return view("eshop::backend.model.index")->with('model', $this->getModel());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insertModel()
    {
        return view("eshop::backend.model.{$this->request->model}.manage")
            ->with('model', $this->getModel())
            ->with('category', $this->request->category_id ? CategoryEshop::findOrFail($this->request->category_id) : null);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateModel()
    {
        return view("eshop::backend.model.{$this->request->model}.manage")
            ->with('model', $current = $this->getModel())
            ->with('current', $current->findOrFail($this->request->parent));
    }

    public function updatePositionModel()
    {
        $current = $this->getModel();

        foreach ($this->request->models as $model) {
            $current->where('id', $model['id'])->update([
                'index' => $model['index']
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function infoModel()
    {
        return view("eshop::backend.model.{$this->request->model}.info")
            ->with('model', $current = $this->getModel())
            ->with('current', $current->findOrFail($this->request->parent));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insertModelParent()
    {
        return view("eshop::backend.model.{$this->request->model}.insert")->with('model', $this->getModel());
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postModel()
    {
        $instance = $this->performPostModel();
        $name = $instance->payload()->name ?? '';

        if ($this->request->current)
            return back()->with('success', "$name | has been updated succesfull!");

        return back()->with('success', "$name | has been insert succesfull!");
    }

    /**
     * @return string|void
     */
    private function performPostModel()
    {
        // Override for search in update
        $this->model = $this->request->current ? $this->searchModel() : $this->getModel();

        $this->checkModelBeforePost();

        $this->model->payload = $this->createModelPayload();

        if (!$this->request->current && $this->model instanceof CategoryEshop)
            $this->model->index = $this->model->count() + 1;

        if (!$this->request->current && $this->model instanceof ProductEshop)
            $this->model->index = $this->model->count() + 1;

        if (!$this->request->current && $this->model instanceof ServiceEshop)
            $this->model->index = $this->model->count() + 1;

//        dd($this->model);

        $this->model->save();

        if (isset($this->request->parent_id)) {
            // Fix bug - not have Home Category (switch with selected)
            if (!$this->model::where('parent_id', null)->first()) {
                $home = $this->model->parent()->first();
                $home->parent_id = null;
                $home->save();
            }
        }

        return $this->model;
    }

    /**
     * @return model
     */
    private function checkModelBeforePost()
    {

//        dd($this->request->current);

        if (isset($this->request->parent_id)) {
            if ((int)$this->request->parent_id > 0)
                $this->model->parent_id = $this->request->parent_id;
            else
                $this->model->parent_id = null;
        }

        if (isset($this->request->category_id))
            $this->model->category_id = json_encode($this->request->category_id);

        if (!isset($this->request->category_id) && $this->request->current)
            if (!$this->model instanceof CategoryEshop)
                unset($this->model->category_id);

        if (isset($this->request->tax_id)) {
            if ((int)$this->request->tax_id > 0)
                $this->model->tax_id = $this->request->tax_id;
            else
                $this->model->tax_id = null;
        }

//        dd($this->model);

        return $this->model;

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteModel()
    {
        $model = ($this->getModel())::findOrFail($this->request->id);

        $this->checkModelBeforeDelete($model);

        $name = $model->payload()->name ?? '';
        $model->delete();

        return back()->with('success', "$name | has been deleted succesfull!");
    }

    /**
     * @param $model
     * @return Model|\Illuminate\Http\RedirectResponse
     */
    private function checkModelBeforeDelete($model)
    {
        if ($model instanceof CategoryEshop)
            if ($model->product()->first())
                return abort(403, "This Category have many Product. U can't delete it");

        if ($model instanceof ProductEshop)
            eshop()->cart()->where('product_id', $model->id)->delete();

//        dd($model);

        return $this->model;

    }


    public function removeImageModel()
    {
        $this->model = ($this->getModel())::findOrFail($this->request->current);

        $this->model->payload = $this->removeFromPayload('image');

        $this->model->save();

        return back()->with('success', "Image has been deleted succesfull!");
    }

    /**
     * @return false|string
     */
    private function createModelPayload()
    {
        $payload = (object)$this->request->payload;

        foreach ($payload as $key => $item) {

            // check syntax of string
            $key = strtolower(preg_replace('/[^\w-]/', '', $key));

            $payload->$key = $item;

            // override images if instance of Uploader
            if ($item instanceof \illuminate\http\UploadedFile)
                $payload->$key = $this->storage->put("{$this->request->model}/" . time(), $item);

        }

//        dd($payload);

        return json_encode($payload);
    }

    /**
     * @param $index
     * @return false|string
     */
    private function removeFromPayload($index)
    {
        $payload = $this->model->payload();

        foreach ($payload as $key => $item) {
            if ($index == $key)
                unset($payload->$key);
        }

//        dd($payload);

        return json_encode($payload);
    }

    /**
     * @return string|void
     */
    private function getModel()
    {
        if (!class_exists($model = "MwSpace\\Eshop\\Model\\" . ucfirst("{$this->request->model}Eshop")))
            return abort(403, "model {$this->request->model} not exist");

        return new $model;
    }

    private function searchModel()
    {
        if (!class_exists($model = "MwSpace\\Eshop\\Model\\" . ucfirst("{$this->request->model}Eshop")))
            return abort(403, "model {$this->request->model} not exist");

        return $model::find($this->request->current);
    }

}

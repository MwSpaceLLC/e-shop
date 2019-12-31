<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use MwSpace\Eshop\Model\CategoryEshop;
use MwSpace\Eshop\Model\ConfigEshop;
use MwSpace\Eshop\Model\OptionEshop;
use MwSpace\Eshop\Model\ProductEshop;

class BackendController extends Base
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
        return isset($this->request->page) ? view("eshop::backend.{$this->request->page}") : view('eshop::backend.index');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('eshop:admin')->logout();
        return back()->with('success', 'Logged Out Successful!');
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
        return view("eshop::backend.model.{$this->request->model}.insert")->with('model', $this->getModel());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateModel()
    {
        return view("eshop::backend.model.{$this->request->model}.update")
            ->with('model', $current = $this->getModel())
            ->with('current', $current->find($this->request->parent));
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
        $this->model = $this->getModel();

        $this->checkModelBeforePost();

        $this->model->payload = $this->createModelPayload();

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
        // Override for search in update
        if ($this->request->current)
            $this->model = $this->searchModel();

        if (isset($this->request->parent_id)) {
            if ((int)$this->request->parent_id > 0)
                $this->model->parent_id = $this->request->parent_id;
            else
                $this->model->parent_id = null;
        }

        if ($this->request->category_id)
            $this->model->category_id = json_encode($this->request->category_id);

        if (!$this->request->category_id && $this->request->current)
            $this->model->category_id = null;

        if (isset($this->request->tax_id)) {
            if ((int)$this->request->tax_id > 0)
                $this->model->tax_id = $this->request->tax_id;
            else
                $this->model->tax_id = null;
        }

//        dd(isset($this->request->parent_id));

        return $this->model;

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function toggleOption()
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

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function configUpdate()
    {
        foreach ($this->request->keys as $key => $value) {
            if (!$config = ConfigEshop::where('key', $key)->first())
                $config = new ConfigEshop();

            if (!$config->key)
                $config->key = $key;

            // override file if instance of Uploader
            if ($value instanceof \illuminate\http\UploadedFile) {
                $config->value = $value->get();

            } else $config->value = $value;

//            dd($config);

            $config->save();
        }

        return back()->with('success', "{$config->key} | has been updated succesfull!");
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
        // Override for search in update
        if ($model instanceof CategoryEshop)
            if ($model->product()->first())
                return abort(403, "This Category have many Product. U can't delete it");

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

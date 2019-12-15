<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller;

use Illuminate\Support\Facades\Auth;

class BackendController extends Base
{

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
        return view("eshop::backend.model")->with('model', $this->getModel());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insertModel()
    {
        return view("eshop::backend.add-model")->with('model', $this->getModel());
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postModel()
    {
        $model = $this->createModel();
        return back()->with('success', "{$this->request->model} has been insert succesfull!");
    }

    /**
     * @return string|void
     */
    private function createModel()
    {
        $model = $this->getModel();
        $model->payload = $this->createModelPayload();

        switch ($this->request->model) {
            case 'UserEshop';
                $model->payload = $this->margePayload($model->payload, ['token' => $model->generateToken()]);
                break;

        }

        $model->save();
        return $model;
    }

    /**
     * @return false|string
     */
    private function createModelPayload()
    {
        $payload = new \stdClass();

        foreach ($this->request->key as $l => $i) {
            $i = preg_replace('/[^\w-]/', '', $i);
            $payload->$i = $this->request->data[$l];
        }

        return json_encode($payload);
    }

    private function margePayload($payload, $array)
    {
        return json_encode(array_merge(json_decode($payload, true), $array));
    }

    /**
     * @return string|void
     */
    private function getModel()
    {
        if (!class_exists($model = "MwSpace\\Eshop\\Model\\{$this->refactorModel()}"))
            return abort(403, "model {$this->request->model} not exist");

        return new $model;
    }

    /**
     * @return string
     */
    private function refactorModel()
    {
        return $this->request->model = ucfirst("{$this->request->model}Eshop");
    }

}

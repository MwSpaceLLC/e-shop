<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use MwSpace\Eshop\Mail\AdminLogin;
use MwSpace\Eshop\Model\CategoryEshop;
use MwSpace\Eshop\Model\ProductEshop;


/**
 * Class Controller
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var Request $request
     */
    protected $request;

    /**
     * @var Storage
     */
    protected $storage;

    /**
     * @var Model
     */
    protected $model;

    /**
     * Controller constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->storage = Storage::disk(config('e-shop.disk'));
    }

    /**
     * @return mixed
     */
    protected function silentAdminToken()
    {
        return Mail::to($this->request->email)->send(new AdminLogin($this->request->email));
    }

    /**
     * @return string|void
     */
    protected function newModel()
    {
        if (!class_exists($model = "MwSpace\\Eshop\\Model\\" . ucfirst("{$this->request->model}Eshop")))
            return abort(403, "model {$this->request->model} not exist");

        return new $model;
    }

    /**
     * @return model|void
     */
    protected function findModel()
    {
        if (!class_exists($model = "MwSpace\\Eshop\\Model\\" . ucfirst("{$this->request->model}Eshop")))
            return abort(403, "model {$this->request->model} not exist");

        return $model::find($this->request->id);
    }

    /**
     * @return false|string
     */
    protected function createModelPayload()
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
    protected function removeFromPayload($index)
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
     * @param $model
     * @return Model|void
     */
    protected function checkModelBeforeDelete($model)
    {
        if ($model instanceof CategoryEshop)
            if ($model->product()->first())
                return abort(403, "This Category have many Product. U can't delete it");

        if ($model instanceof ProductEshop)
            eshop()->cart()->where('product_id', $model->id)->delete();

//        dd($model);

        return $this->model;

    }

}

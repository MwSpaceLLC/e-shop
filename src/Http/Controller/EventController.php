<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Http\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

    private $paginator = 8;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function tables(Request $request)
    {
        $Model = ucfirst($request->model);
        $Class = "App\\$Model";
        if (!class_exists($Class))
            return abort(403, "Model $Class not exis");

        return view('eshop.pages.table')->with('items', $Class::paginate($this->paginator));
    }

    public function insert(Request $request)
    {

        $request->obj = new \stdClass();
        $date = date('dmy');
        $Model = ucfirst($request->model);
        $Class = "App\\$Model";
        if (!class_exists($Class))
            return abort(403, "Model $Class not exis");

        /**
         * Save image if exist */
        foreach ($request->payload as $key => $payload) {
            if ($payload instanceof UploadedFile)
                $request->obj->$key = '/eshop/i/' . Storage::disk('public')->put("$Model/$date", $payload);
            else
                $request->obj->$key = $payload;
        }

        $save = new $Class;
        $save->payload = json_encode($request->obj);
        $save->save();

        return back()->with('success', "$Model succesful addedd");

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('eshop')->logout();
        return response()->json('success', 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        Auth::guard('eshop')->logout();
        return response()->json('success', 200);
    }

    /**
     * Display the e-shop view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('eshop::app');
    }
}

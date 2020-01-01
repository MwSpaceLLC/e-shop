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
class EshopApi extends \stdClass
{
    public $route = array();
    private $value;

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function routes()
    {
        foreach (Route::getRoutes() as $value) {

            $this->value = $value;

            $api = request()->route()->parameters['page'];

            if ($value->getName() === "eshop-api-$api")
                $this->route[] = (object)[
                    'method' => strtolower($value->methods()[0]),
                    'path' => $value->uri(),
//                    'name' => $value->getName(),
                    'action' => $this->get_class_methods(),
                    'doc' => $this->get_class_doc(),
                ];
        }

        return $this->route;
    }

    /**
     * @throws \ReflectionException
     * @see https://www.x-note.co.uk/get-php-function-body-as-string
     */
    private function get_class_methods()
    {
        $Class = explode('@', $this->value->getActionName())[0];
        $method = explode('@', $this->value->getActionName())[1];

        $func = new \ReflectionMethod($Class, $method);

        $filename = $func->getFileName();
        $start_line = $func->getStartLine() - 1;
        $end_line = $func->getEndLine();
        $length = $end_line - $start_line;
        $source = file($filename);
        $body = implode("", array_slice($source, $start_line, $length));

        return $body;
    }

    /**
     * @return false|string
     * @throws \ReflectionException
     */
    private function get_class_doc()
    {
        $Class = explode('@', $this->value->getActionName())[0];
        $method = explode('@', $this->value->getActionName())[1];
        $func = new \ReflectionMethod($Class, $method);
        $func = $func->getDocComment();
        $func = str_replace('/','',$func);
        $func = str_replace('*','',$func);
        $func = trim($func);

        return $func;
    }

}

<?php
namespace Jan\Components\Routing;


/**
 * Class Router
 * @package Jan\Components\Routing
*/
class Router
{
    /** @var array */
    private $routes = [];


    /** @var string  */
    private $host;


    /**
     * Router constructor.
     * @param string $host
    */
    public function __construct(string $host)
    {
        $this->host = $host;
    }


    /**
     * Add routes
     * @param array $routes
    */
    public function addRoutes(array $routes)
    {
        $this->routes = $routes;
    }


    /**
     * @param string $requestMethod
     * @param string $url
     * @return array|bool
    */
    public function match(string $requestMethod, string $url)
    {
         if(isset($this->routes[$requestMethod]))
         {
             foreach($this->routes[$requestMethod] as $pattern => $route)
             {
                 if(preg_match('~^' . $pattern . '$~i', $url, $matches))
                 {
                     array_shift($matches);
                     /* list($controller, $action) = explode('@', $route['callback']); */

                     return [
                         //'controller' => $controller,
                         // 'action' => $action,
                         // 'matches' => $matches
                     ];
                 }
             }
         }

         return false;
    }


    /**
     * @param object $controller
     * @param $action
     * @param array $arguments
     * @return mixed
    */
    public function callAction(object $controller, $action, $arguments = [])
    {
        if(! is_callable([$controller, $action]))
        {
            die('No callable');
        }
        return call_user_func_array([$controller, $action], $arguments);
    }
}
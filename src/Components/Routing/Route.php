<?php
namespace Jan\Components\Routing;


/**
 * Class Route
 * @package Jan\Components\Routing
*/
class Route
{

    /** @var array */
    private static $routes;


    /** @var array  */
    private static $namedRoutes = [];


    /** @var mixed */
    private static $prefixes;


    /** @var array  */
    private $regex = [];


    /**
     * Add route by request GET
     * @param string $path
     * @param string| \Closure $target
     * @param string|null $name
     * @return Route
    */
    public static function get(string $path, $target, string $name = null)
    {
        return static::map('GET', $path, compact('target', 'name'));
    }


    /**
     * Add route by request POST
     * @param string $path
     * @param string| \Closure $target
     * @param string|null $name
     * @return Route
     */
    public static function post(string $path, $target, string $name = null)
    {
        return static::map('POST', $path, compact('target', 'name'));
    }


    /**
     * Add route by request PUT
     * @param string $path
     * @param string| \Closure $target
     * @param string|null $name
     * @return Route
     */
    public static function put(string $path, $target, string $name = null)
    {
        return static::map('PUT', $path, compact('target', 'name'));
    }


    /**
     * Add all routes by request DELETE
     * @param string $path
     * @param string| \Closure $target
     * @param string|null $name
     * @return Route
     */
    public static function delete(string $path, $target, string $name = null)
    {
        return static::map('DELETE', $path, compact('target', 'name'));
    }


    /**
     * Add resource of routes
     * @param string $path
     * @param string $controller
     */
    public static function resource(string $path, $controller)
    {

    }


    /**
     * Add resources of routes
     * @param array $prefixes
     * @param \Closure $callback
     */
    public static function group(array $prefixes, \Closure $callback)
    {
         self::$prefixes = $prefixes;
         call_user_func($callback);
         self::$prefixes = null;
    }


    /**
     * Add route by request PUT
     * @param \Closure $callback
     * @param string $prefix
     */
    public static function api(\Closure $callback, string $prefix = 'api')
    {

    }


    /**
     * Add / Map route with parameters
     * @param string $requestMethod
     * @param string $path
     * @param array $options
     * @return Route
     */
    public static function map(string $requestMethod, string $path, array $options)
    {
          $pattern = self::trailingSlashesPath($path);
          // $options = self::prepareOptions($options);

          if(isset(self::$routes[$requestMethod][$pattern]))
          {
              die(sprintf('This route (%s) already set!', $pattern));
          }

          self::$routes[$requestMethod][$pattern] = $options;

          return new static();
    }


    /**
     * @param $param
     * @param $regex
    */
    public function with($param, $regex)
    {

    }


    /**
     * @param string $path
     * @param array $params
    */
    public static function url(string $path, array $params = [])
    {

    }


    /**
     * @return array
    */
    public static function collection()
    {
         return self::$routes;
    }


    /**
     * @param string $path
     * @return string
    */
    private static function trailingSlashesPath(string $path)
    {
        return trim($path, '/');
    }


    /**
     * @param $callback
     */
    private static function mapCallBack($callback)
    {

    }
}
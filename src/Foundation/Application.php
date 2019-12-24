<?php
namespace Jan\Foundation;


use Jan\Components\DependencyInjection\Container;
use Jan\Components\Routing\Route;
use Jan\Contracts\Http\ClientServerInterface;
use Jan\Contracts\Http\RequestInterface;
use Jan\Contracts\Http\ResponseInterface;



/**
 * Class Application
 * @package Jan\Foundation
*/
class Application implements ClientServerInterface
{
    /**
     * @var // ContainerInterface
    */
    private $container;


    /**
     * Application constructor.
     * @param string $root
    */
    public function __construct(string $root)
    {
         // Load routes
         class_alias('Jan\\Components\\Routing\\Route', 'Route');
         require_once rtrim($root) . '/routes/app.php';

         /* debug(Route::collection()); */

         // Get container
         $this->container = new Container();
    }


    /**
     * @param string $key
     * @param $resolver
    */
    public function bind(string $key, $resolver)
    {
        $this->container->set($key, $resolver);
    }


    /**
     * @param string $classname
     * @param array $parameters
     * @return object
    */
    public function make(string $classname, $parameters = [])
    {
        return $this->container->make($classname, $parameters);
    }


    /**
     * @param string $key
     * @param $resolver
    */
    public function factory(string $key, $resolver)
    {

    }



    /**
     * @param string $key
     * @param $resolver
     */
    public function singleton(string $key, $resolver)
    {

    }


    /**
     * @param string $key
     * @return mixed
    */
    public function get(string $key)
    {
        return $this->container->get($key);
    }


    /**
     * @param RequestInterface $request
     * @return ResponseInterface
    */
    public function handle(RequestInterface $request): ResponseInterface
    {

    }


    /**
     * Bootstrap of Application
    */
    public function bootstrap()
    {
         /*
          Load alias
          Load files
         */
    }


    /**  */
    public function run()
    {
         echo '<h1>Service Container</h1>';
         $this->container->collection();

         // echo '<h1>Route Collection</h1>';
         // debug(Route::collection());
    }
}
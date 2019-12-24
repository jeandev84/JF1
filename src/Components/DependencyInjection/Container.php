<?php
namespace Jan\Components\DependencyInjection;


use Jan\Contracts\Container\ContainerInterface;


/**
 * Class Container
 * @package Jan\Components\DependencyInjection
*/
class Container implements ContainerInterface
{

    /** @var array */
    private $services = [];


    /** @var array */
    private $factories = [];


    /** @var array */
    private $instances = [];


    /** @var bool */
    private $autowire = false;



    private function __clone() {}

    /**
     * Container constructor.
    */
    public function __construct()
    {
    }

    /**
     * @param string $key
     * @param mixed $resolver
     * @return Container
    */
    public function set(string $key, $resolver): self
    {
         $this->services[$key] = $resolver;
         return $this;
    }


    /**
     * @param string $key
     * @param $resolver
     * @return Container
    */
    public function factory(string $key, $resolver): self
    {
         $this->factories[$key] = $resolver;
         return $this;
    }


    /**
     * @param string $classname
     * @param array $parameters
     * @return object
    */
    public function make(string $classname, array $parameters = []): object
    {
         // return new $classname($parameters);
    }


    /**
     * @param string $key
     * @return bool
    */
    public function has(string $key): bool
    {
        if(isset($this->services[$key]))
        {
            return true;
        }

        if(isset($this->factories[$key]))
        {
            return true;
        }

        return false;
    }

    /**
     * @param bool $status
     * @return Container
     */
    public function useAutowiring(bool $status): self
    {
         $this->autowire = $status;
         return $this;
    }


    /**
     * @param $key
     * @return mixed
    */
    public function get(string $key)
    {
        if(isset($this->factories[$key]))
        {
            return $this->factories[$key];
        }

        if(! $this->instances[$key])
        {
             if(! isset($this->services[$key]))
             {
                  if($this->autowire === true)
                  {
                      return $this->autowire($key);
                  }
                  die(sprintf('This key (%s) does not set yet!', $key));

             }
             $this->instances[$key] = $this->services[$key];
        }

        return $this->instances[$key];
    }


    /**
     * @param string $key
    */
    public function autowire(string $key)
    {

    }


    /**
     * @param array $args
     * @return object
    */
    public function constructor(...$args)
    {

    }


    /**
     * @param string $key
    */
    public function remove(string $key)
    {

    }


    /** Get services collections */
    public function collection()
    {
        echo '<h3>Services</h3>';
        debug($this->services);

        echo '<h3>Factories</h3>';
        debug($this->factories);

        echo '<h3>Instances</h3>';
        debug($this->instances);
    }
}
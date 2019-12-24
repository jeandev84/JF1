<?php
namespace Jan\Components\Http;


use Jan\Contracts\Http\RequestInterface;


/**
 * Class Request
 * @package Jan\Components\Http
*/
class Request implements RequestInterface
{

     /** @var QueryParameter */
     private $queryParams;


     /** @var Cookie */
     private $cookies;


     /** @var ServerParameter */
     private $server;


     /** @var UploadedFile */
     private $files;


     /** @var HeaderParameter */
     private $headers;


     /** @var string  */
     private $content;


     /** @var string */
     private $baseUrl;

    /**
     * @var string|null
    */
    private $domain;


    /**
     * Request constructor.
     * @param string|null $domain
     */
     public function __construct(string $domain = null)
     {
         $this->domain = $domain;
         $this->queryParams = new QueryParameter($_GET);
         $this->server = new ServerParameter($_SERVER);
         $this->cookies = new Cookie($_COOKIE);
     }


     /**
      * @param string $url
     */
     public function prepare(string $url)
     {

     }


     /**
      * @param string $key
     */
     public function get(string $key)
     {

     }


    /**
     * @param string $key
    */
    public function post(string $key)
    {

    }

    /**
     * @param string $key
     */
    public function input(string $key)
    {

    }


    /**
     * @param string $content
    */
    public function body(string $content)
    {
         $this->content = $content;
    }


    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if(property_exists($this, $name))
        {
            return $this->{$name};
        }
    }


    /**
      * @return string
     */
     public function baseUrl()
     {
         return $this->baseUrl;
     }


}
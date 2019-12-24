<?php
namespace Jan\Contracts\Http;


/**
 * Interface ResponseInterface
 * @package Jan\Contracts\Http
 */
interface ResponseInterface
{
    /**
     * @return mixed
    */
    public function send();
}
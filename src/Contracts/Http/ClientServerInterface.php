<?php
namespace Jan\Contracts\Http;


/**
 * Interface ClientServerInterface
 * @package Jan\Contracts\Http
*/
interface ClientServerInterface
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
    */
    public function handle(RequestInterface $request): ResponseInterface;
}
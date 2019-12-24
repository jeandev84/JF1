<?php
namespace Jan\Components\Http;

use Jan\Contracts\Http\ResponseInterface;


/**
 * Class Response
 * @package Jan\Components\Http
*/
class Response implements ResponseInterface
{

    /** @var string */
    private $content;

    /** @var int */
    private $status;


    /** @var array  */
    private $headers = [];


    /** @var string  */
    private $protocolVersion;


    /**
     * Response constructor.
     * @param string $content
     * @param int $status
     * @param array $headers
     */
    public function __construct(string $content, $status = 200, array $headers = [])
    {
        $this->setContent($content);
        $this->setStatusCode($content);
        $this->setHeader($headers);
        $this->setProtocolVersion('1.0');
    }


    /**
     * @param string $protocolVersion
     * @return Response
    */
    public function setProtocolVersion(string $protocolVersion)
    {
        $this->protocolVersion = $protocolVersion;
        return $this;
    }


    /**
     * @param string $content
     * @return Response
    */
    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }


    /**
     * @return string
    */
    public function getContent()
    {
       return $this->content;
    }


    /**
     * @param int $status
     * @return Response
    */
    public function setStatusCode(int $status)
    {
        $this->status = $status;
        return $this;
    }


    /**
     * @return int|null
    */
    public function getStatusCode(): ?int
    {
        return $this->status;
    }


    /**
     * @param array|string $header
     * @return Response
     */
    public function setHeader($header)
    {
        $this->headers = $header;
        return $this;
    }


    /**
     * @return array
    */
    public function getHeaders()
    {
        return $this->headers;
    }


    /**
     * @return $this
    */
    public function sendHeaders()
    {
        if(headers_sent())
        {
            return $this;
        }

        foreach ($this->headers as $header)
        {
            header($header);
        }

        return $this;
    }


    /**
     * @return $this
    */
    public function sendContent()
    {
        echo $this->content;
        return $this;
    }

    /**
     * @return void
    */
    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();
    }
}
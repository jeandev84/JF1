<?php
namespace Jan\Components\Templating;


/**
 * Class View
 * @package Jan\Components\Templating
*/
class View
{

    /** @var string */
    private $templatePath;


    /** @var string */
    private $layout;


    /**
     * View constructor.
     * @param string $templatePath
    */
    public function __construct(string $templatePath)
    {
         $this->templatePath = $templatePath;
    }


    /**
     * @param string $layout
    */
    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param string $template
     * @param array $data
     * @return false|string
    */
    public function renderHtml(string $template, array $data = [])
    {
         extract($data);

         ob_start();
         $this->load($template);
         if($this->layout !== '')
         {
             $content = ob_get_contents();
             $this->load($this->layout);
         }
         return ob_get_clean();
    }

    /**
     * @param $path
     * @return string
    */
    protected function load(string $path)
    {
        require_once $this->templatePath.'/'.str_replace(['.', '/'], ['/', DIRECTORY_SEPARATOR], $path);
    }
}
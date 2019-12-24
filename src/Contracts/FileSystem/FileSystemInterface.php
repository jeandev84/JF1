<?php
namespace Jan\Contracts\FileSystem;


/**
 * Interface FileSystemInterface
 * @package Jan\Contracts\FileSystem
*/
interface FileSystemInterface
{
     /**
      * @param string $path
      * @return string
     */
     public function localise(string $path): string;

     /**
      * @param string $path
      * @return mixed
     */
     public function load(string $path);
}
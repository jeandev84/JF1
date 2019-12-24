<?php

/**
 * @param array $arr
 * @param bool $die
*/
function debug(array $arr, $die = false)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    if($die) die;
}
<?php

/**
 * Die and Dump
 * 
 * @param $var
 */
function dd($var) {
    die(var_dump($var));
}

/**
 * The directory the app lives in. Assumes it will only be called from public/index.php
 * 
 * @return string
 */
function app_dir() {
    $parts = explode(DIRECTORY_SEPARATOR, getcwd());
    array_pop($parts);
    
    return implode(DIRECTORY_SEPARATOR, $parts);
}

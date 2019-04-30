<?php
if (!function_exists('frontendView')) {
    function frontendView($view = 'index',$data=[])
    {
        extract($data);
        if (!empty($view)) {
            return require_once __DIR__.'/../view/FrontEnd/'.$view.'.php';
        } else {
            return 'File does not exists';
        }
    }
}
if (!function_exists('backendView')) {
    function backendView($view = 'index',$data=[])
    {
        extract($data);
        if (!empty($view)) {
            return require_once __DIR__.'/../view/BackEnd/'.$view.'.php';
        } else {
           return  'File does not exists';
        }
    }
}

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

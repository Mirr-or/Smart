<?php
namespace Core;

class Request
{

    public static function url()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function goBack()
    {
        $url = array_key_exists('HTTP_REFERER', $_SERVER) ? $_SERVER['HTTP_REFERER'] : '/';

        header('Location: ' . $url);
    }
}
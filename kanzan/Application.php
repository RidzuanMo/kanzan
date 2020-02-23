<?php

namespace kanzan;

use Exception;

class Application
{
    protected static $container = [];

    public static function bind($file)
    {
        self::$container = $file;
    }

    public static function getContainer()
    {
        return self::$container;
    }

    public static function get($key)
    {
        if (array_key_exists($key, self::$container) == false)
        {
            throw new Exception('Key ' . $key . ' not found in application container');
        }
        return self::$container[$key];
    }

    public static function set($key, $value)
    {
        self::$container[$key] = $value;
    }
}
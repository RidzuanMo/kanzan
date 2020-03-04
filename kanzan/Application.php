<?php

namespace kanzan;

use Exception;
use Noodlehaus\Config;
use Noodlehaus\Parser\Yaml;

class Application
{
    protected static $container = [];

    public static function getRoot()
    {
        return __DIR__ . '/../';
    }

    public static function isEmpty()
    {
        return empty(self::$container);
    }

    public static function bind($file)
    {
        $_config = new Config($file, new Yaml);
        //var_dump($_config->all()); die();
        self::$container = $_config->all();
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
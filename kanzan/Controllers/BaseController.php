<?php

namespace Kanzan\Controllers;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Kanzan\Application;

class BaseController {
    protected const LOG_LEVEL_DEBUG = 'debug';
    protected const LOG_LEVEL_INFO = 'info';
    protected const LOG_LEVEL_WARNING = 'warning';
    protected const LOG_LEVEL_ERROR = 'error';
    protected const LOG_LEVEL_CRITICAL = 'critical';
    protected const LOG_LEVEL_ALERT = 'alert';
    protected const LOG_LEVEL_EMERGENCY = 'emergency';

    protected $container;

    public function __construct()
    {
        $this->container = Application::getContainer();
    }

    protected function path_for($alias)
    {
        $route = \Kanzan\Models\Route::where('alias', $alias)->first();
        $path = $route->path;

        return $path;
    }

    protected function getTopbarMenu()
    {
        $topbar = \Kanzan\Models\Route::where('category', 'TOPBAR')->get();
        return $topbar;
    }

    public function getFilesystem($what)
    {
        $folder = $this->container["sourcecode"][$what]["path"];
        
        $adapter = new Local($folder);
        $filesystem = new Filesystem($adapter);

        return $filesystem;
    }

    public function browse($what, $path, $recursive = true)
    {
        $filesystem = $this->getFilesystem($what);
        $contents = $filesystem->listContents($path, $recursive);
        
        return $contents;
    }

    public function openFile($what, $path)
    {
        $filesystem = $this->getFilesystem($what);
        $contents = $filesystem->read($path);
        
        return $contents;
    }

    public function writeOrUpdate($what, $file, $content)
    {
        $filesystem = $this->getFilesystem($what);
        $response = $filesystem->put($file, $content);

        return $response;
    }

    public function createDirectory($what, $path)
    {
        $filesystem = $this->getFilesystem($what);
        $response = $filesystem->createDir($path);

        return $response;
    }

    public function deleteFileOrDirectory($what, $path)
    {
        $filesystem = $this->getFilesystem($what);
        $response = $filesystem->delete($path);

        return $response;
    }

    public function render($page, $args = [])
    {
        return $this->container['view']->render($page, $args);
    }

    public function redirect($path)
    {
        return new \Laminas\Diactoros\Response\RedirectResponse($path);
    }

    public function logger($level, $message, $context = [])
    {
        $this->container['logger']->$level($message, $context);
    }
}
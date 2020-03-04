<?php

use Kanzan\Application;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require __DIR__ . '/vendor/autoload.php';

if (Application::isEmpty())
{
    Application::bind( __DIR__ . '/config.yaml');
}

date_default_timezone_set(Application::get('timezone'));

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection(Application::get("database")['default']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

//pass the connection to global container (created in previous article)
Application::set("db", function () use ($capsule){
   return $capsule;
});

$loader = new \Twig\Loader\FilesystemLoader(Application::getRoot() . Application::get('view')['template']);
$twig = new \Twig\Environment($loader, [
    'cache' => Application::get('view')['cache'],
]);

$path_for = new \Twig\TwigFunction('path_for', function ($alias) {
    $route = \Kanzan\Models\Route::where('alias', $alias)->first();
    $path = $route->path;

    if ($route->parameter != "")
    {
        $path = $path . '?' . $route->parameter;
    }

    return $path;
});
$twig->addFunction($path_for);

$style_load = new \Twig\TwigFunction('style_load', function () {
    //return Application::get('style');
});
$twig->addFunction($style_load);

$script_load = new \Twig\TwigFunction('script_load', function ($when) {
    //return Application::get('script')[$when];
});
$twig->addFunction($script_load);

$title = new \Twig\TwigFunction('title', function () {
    return Application::get('title');
});
$twig->addFunction($title);

Application::set('view', $twig);

$logger = new Logger(Application::get('title'));

$logger->pushHandler(new StreamHandler(Application::get('logger')['path'], Application::get('logger')['level']));
$logger->pushHandler(new BrowserConsoleHandler(Application::get('logger')['level']));

Application::set('logger', $logger);



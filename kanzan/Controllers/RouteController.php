<?php

namespace Kanzan\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class RouteController extends BaseController
{
    private const VIEW_INDEX = '/control_panel/router.twig';
    private const VIEW_REGISTRATION_FORM = '/control_panel/router_register.twig';

    public function index(ServerRequestInterface $request) : ResponseInterface
    {
        $routes = \Kanzan\Models\Route::all();

        $args = [
            "topbar" => $this->getTopbarMenu(),
            "data" => $routes
        ];

        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_INDEX, $args));
        return $response;
    }

    public function register(ServerRequestInterface $request) : ResponseInterface
    {
        $args = [
            "topbar" => $this->getTopbarMenu()
        ];

        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_REGISTRATION_FORM, $args));
        return $response;
    }

    public function create(ServerRequestInterface $request) : ResponseInterface
    {
        $args = $request->getParsedBody();

        $this->logger(self::LOG_LEVEL_DEBUG, "RouteController::create", $args);

        $route = new \Kanzan\Models\Route();
        $route->method = $args["method"];
        $route->path = $args["path"];
        $route->alias = $args["alias"];
        $route->controller = $args["controller"];
        $route->function = $args["function"];
        $route->save();

        return $this->redirect($this->path_for('controlpanel.router'));
    }
}
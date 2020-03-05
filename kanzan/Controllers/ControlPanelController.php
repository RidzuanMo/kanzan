<?php

namespace Kanzan\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ControlPanelController extends BaseController
{
    protected const VIEW_INDEX = "/control_Panel/index.twig";
    protected const VIEW_CONFIG = "/control_Panel/config.twig";

    public function index(ServerRequestInterface $request) : ResponseInterface
    {
        $args = [
            "topbar" => $this->getTopbarMenu()
        ];

        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_INDEX, $args));
        return $response;
    }

    public function config(ServerRequestInterface $request) : ResponseInterface
    {
        $args = [
            "topbar" => $this->getTopbarMenu(),
            "data" => $this->container
        ];

        $this->logger($this::LOG_LEVEL_DEBUG,"ControlPanelController::config", $this->container);

        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_CONFIG, $args));
        return $response;
    }
}
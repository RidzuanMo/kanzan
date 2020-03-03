<?php

namespace Kanzan\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ControlPanelController extends BaseController
{
    protected const VIEW_INDEX = "/control_Panel/index.twig";

    public function index(ServerRequestInterface $request) : ResponseInterface
    {
        $topbar = $this->getTopbarMenu();
        
        $args = [
            "topbar" => $topbar
        ];

        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_INDEX, $args));
        return $response;
    }
}
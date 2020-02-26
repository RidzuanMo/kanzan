<?php

namespace Kanzan\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PortalController extends BaseController
{
    private const VIEW_INDEX = '/portal/login.twig';
    private const VIEW_HOME = '/portal/home.twig';

    public function index(ServerRequestInterface $request) : ResponseInterface
    {
        //$this->log($this::LOG_LEVEL_WARNING, 'Hello ..show index.twig');
        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_INDEX));
        return $response;
    }

    public function home(ServerRequestInterface $request) : ResponseInterface
    {
        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_HOME));
        return $response;
    }

    public function source(ServerRequestInterface $request) : ResponseInterface
    {
        $file = $request->getQueryParams()["path"];
        $contents = $this->openFile("controller", $file);

        $args = [
            "page_title" => "Controllers",
            "filename" => end(explode("/", $file)),
            "contents" => $contents
        ];

        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_SOURCE, $args));
        return $response;
    }
}
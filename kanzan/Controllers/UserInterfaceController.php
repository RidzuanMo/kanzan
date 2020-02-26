<?php

namespace Kanzan\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserInterfaceController extends BaseController
{
    private const FILESYSTEM_PORTAL = "portal";
    private const FILESYSTEM_APPLICATION = "application";
    private const SOURCE_LOGIN = "login.twig";
    private const VIEW_BROWSE = '/control_panel/browse.twig';
    private const VIEW_SOURCECODE = "/control_panel/sourcecode.twig";

    public function index(ServerRequestInterface $request) : ResponseInterface
    {
        $what = self::FILESYSTEM_APPLICATION;
        $path = $request->getQueryParams()["path"];
        
        $contents = $this->browse($what, $path, false);
        
        $args = [
            "group" => $what,
            "root" => "app",
            "page_title" =>  $path,
            "contents" => $contents
        ];

        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_BROWSE, $args));
        return $response;
    }

    public function login(ServerRequestInterface $request) : ResponseInterface
    {   
        $contents = $this->openFile(self::FILESYSTEM_PORTAL, self::SOURCE_LOGIN);

        $args = [
            "group" => "portal",
            "path" => "login.twig",
            "filename" => "portal/login",
            "codetype" => 'twig',
            "contents" => $contents
        ];

        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_SOURCECODE, $args));
        return $response;
    }
}
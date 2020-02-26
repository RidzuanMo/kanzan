<?php

namespace Kanzan\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SourceCodeController extends BaseController
{
    private const VIEW_BROWSE = '/control_panel/browse.twig';
    private const VIEW_SOURCE = '/control_panel/sourcecode.twig';
    private const TEMPLATE_CONTROLLER = '/general/controller.twig';
    private const TEMPLATE_MODEL = '/general/model.twig';
    private const TEMPLATE_MODULE = '/general/module.twig';

    private const AVAILABLE_NAMESPACE = [
        "controller" => "App/Controllers/",
        "model" => "App/Models/",
        "module" => "App/Modules/"
    ];

    public function index(ServerRequestInterface $request) : ResponseInterface
    {
        $what = $request->getQueryParams()["what"];
        $path = $request->getQueryParams()["path"];
        
        $contents = $this->browse($what, $path, false);
        
        $args = [
            "group" => $what,
            "root" => $this::AVAILABLE_NAMESPACE[$what],
            "page_title" =>  $path,
            "contents" => $contents
        ];

        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_BROWSE, $args));
        return $response;
    }

    public function show(ServerRequestInterface $request) : ResponseInterface
    {
        $what = $request->getQueryParams()["what"];
        $file = $request->getQueryParams()["path"];
        
        $contents = $this->openFile($what, $file);

        $args = [
            "group" => $what,
            "path" => $file,
            "filename" => end(explode("/", $file)),
            "codetype" => "php",
            "contents" => $contents
        ];

        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write($this->render(self::VIEW_SOURCE, $args));
        return $response;
    }

    public function create(ServerRequestInterface $request) : ResponseInterface
    {
        $what = $request->getParsedBody()["what"];
        $root = $request->getParsedBody()["root"];
        $path = $request->getParsedBody()["path"];
        $filename = $request->getParsedBody()["filename"];
        
        $template = $this::TEMPLATE_CONTROLLER;

        if ($what == "model")
        {
            $template = $this::TEMPLATE_MODEL;
        } 
        elseif ($what == "module")
        {
            $template = $this::TEMPLATE_MODULE;
        }

        $content = $this->render($template, [
            "namespace" => str_replace("/" , "\\", $root . $path),
            "name" => $filename
        ]);

        $this->writeOrUpdate($what, $path . "/" . $filename . ".php", $content);

        return $this->redirect("/source?what=" . $what . "&path=" . $path);
    }

    public function update(ServerRequestInterface $request) : ResponseInterface
    {
        $this->log($this::LOG_LEVEL_INFO, "update file", $request->getParsedBody());
        $what = $request->getParsedBody()["group"];
        $path = $request->getParsedBody()["path"];
        $content = $request->getParsedBody()["content"];

        $this->writeOrUpdate($what, $path, $content);

        return $this->redirect("/source/show?what=" . $what ."&path=" . $path);
    }

    public function delete(ServerRequestInterface $request) : ResponseInterface
    {
        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write("Hello World...");
        return $response;
    }
}
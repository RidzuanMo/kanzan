<?php

namespace App\Controllers;

use Kanzan\Controllers\BaseController;

class SampleController extends BaseController
{
    public function index(ServerRequestInterface $request) : ResponseInterface
    {
        $response = new \Laminas\Diactoros\Response;
        $response->getBody()->write("Hello World...");
        return $response;
    }
}

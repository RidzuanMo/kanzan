<?php

$router = new League\Route\Router;

// map a route
$router->map('GET', '/', 'Kanzan\Controllers\PortalController::index')->setName('default');
$router->map('POST', '/home', 'Kanzan\Controllers\PortalController::home')->setName('home');
$router->map('GET', '/source', 'Kanzan\Controllers\SourceCodeController::index')->setName('source.browse');
$router->map('GET', '/source/show', 'Kanzan\Controllers\SourceCodeController::show')->setName('source.show');
$router->map('POST', '/source/create', 'Kanzan\Controllers\SourceCodeController::create')->setName('source.create');
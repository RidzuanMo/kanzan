<?php

$router = new League\Route\Router;

// map a route
$router->map('GET', '/', 'Kanzan\Controllers\PortalController::index')->setName('default');
$router->map('POST', '/home', 'Kanzan\Controllers\PortalController::home')->setName('home');

// control panel
$router->map('GET', '/control-panel', 'Kanzan\Controllers\ControlPanelController::index')->setName('controlpanel');
$router->map('GET', '/control-panel/ui/portal/login', 'Kanzan\Controllers\userInterfaceController::login')->setName('controlpanel.ui.portal.login');
$router->map('GET', '/control-panel/ui/app', 'Kanzan\Controllers\userInterfaceController::index')->setName('controlpanel.ui.app');

$router->map('GET', '/source', 'Kanzan\Controllers\SourceCodeController::index')->setName('source.browse');
$router->map('GET', '/source/show', 'Kanzan\Controllers\SourceCodeController::show')->setName('source.show');
$router->map('POST', '/source/create', 'Kanzan\Controllers\SourceCodeController::create')->setName('source.create');
$router->map('POST', '/source/update', 'Kanzan\Controllers\SourceCodeController::update')->setName('source.update');
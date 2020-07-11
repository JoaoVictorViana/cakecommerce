<?php

include_once ROOTPATH . '/routers/src/RouterService.php';

$router = new RouterService(new Router);

include_once ROOTPATH . '/routers/web.php';

$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];
$router->run($request_method, $request_uri);


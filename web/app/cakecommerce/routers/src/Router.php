<?php

class Router
{
    public $routers;

    protected $container;

    protected $facade;

    public function __construct() {}

    public function run(
        string $method,
        string $uri,
        array $args
    ): void {
        call_user_func($this->routers[$method][$uri], $args);
    }

    public function addRoute(string $method, $uri, $function)
    {
        $this->routers[$method][$uri] = $function;
    }
}
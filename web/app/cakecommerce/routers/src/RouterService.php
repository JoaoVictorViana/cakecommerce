<?php

/**
 * Router Service
 */

require ROOTPATH . '/routers/src/Router.php';

class RouterService
{
    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function get(string $uri, $function): void
    {
        if (!$this->router) {
            return ;
        }

        $this->router->addRoute('GET', $uri, $function);
    }

    public function run(string $method, string $uri): void
    {
        if (!$this->validate($method, $uri)) {
            return;
        }

        $this->router->run($method, $uri, []);
    }

    private function validate(string $method, string $uri): bool
    {
        if (!$this->validateRouter()) {
            return false;
        }

        if (!array_key_exists($method, $this->router->routers)) {
            return false;
        }
        
        if (empty($this->router->routers[$method][$uri])) {
            return false;
        }

        return true;
    }

    private function validateRouter(): bool
    {
        return $this->router && $this->router->routers;
    }

}
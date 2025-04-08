<?php

namespace Smartlab\ParticipantForm\Core\Http;

class Router
{
    private array $routes = [];
    private string $location;
    private bool $hasRoute = false;

    public function __construct()
    {
        $splitUrl = explode('/', rtrim($_ENV['BASE_URL'], '/'));
        $basePath = '/' . end($splitUrl);
        $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $request_uri = str_replace($basePath, '', $request_uri);
        $this->location = $request_uri !== '/' ? rtrim($request_uri, '/') : '/';
    }

    public function get(string $path, $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post(string $path, $callback): void
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $this->location;

        foreach ($this->routes[$method] as $route => $callback) {
            $pattern = $this->convertRouteToRegex($route);

            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches);

                if (is_callable($callback)) {
                    call_user_func_array($callback, $matches);
                } elseif (is_array($callback) && count($callback) === 2) {
                    [$controller, $method] = $callback;
                    (new $controller())->$method(...$matches);
                }

                $this->hasRoute = true;
                return;
            }
        }

        $this->hasRoute = false;
    }

    public function getHasRoute(): bool
    {
        return $this->hasRoute;
    }

    private function convertRouteToRegex(string $route): string
    {
        $patterns = [
            '/\{id\}/' => '([0-9]+)',                          // ID
            '/\{url\}/' => '([a-zA-Z0-9-_]+)',                 // slug
            '/\{uuid\}/' => '([a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12})' // UUID v4
        ];

        foreach ($patterns as $key => $value) {
            $route = preg_replace($key, $value, $route);
        }

        return '/^' . str_replace('/', '\/', $route) . '$/';
    }
}

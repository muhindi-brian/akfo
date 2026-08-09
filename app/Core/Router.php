<?php

declare(strict_types=1);

namespace App\Core;

use App\Controllers\ErrorController;

final class Router
{
    /** @var array<string, array<string, array{0: class-string, 1: string}>> */
    private array $routes = [];

    public function get(string $path, array $handler): self
    {
        return $this->add('GET', $path, $handler);
    }

    public function post(string $path, array $handler): self
    {
        return $this->add('POST', $path, $handler);
    }

    public function add(string $method, string $path, array $handler): self
    {
        $this->routes[$method][$this->normalize($path)] = $handler;
        return $this;
    }

    public function dispatch(string $method, string $uri): void
    {
        $uri = $this->normalize(parse_url($uri, PHP_URL_PATH) ?: '/');
        $method = strtoupper($method);

        if (isset($this->routes[$method][$uri])) {
            $this->invoke($this->routes[$method][$uri], []);
            return;
        }

        foreach ($this->routes[$method] ?? [] as $route => $handler) {
            $pattern = preg_replace('#\{([a-zA-Z_]+)\}#', '(?P<$1>[^/]+)', $route);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $uri, $matches)) {
                $params = array_filter(
                    $matches,
                    static fn ($key) => !is_int($key),
                    ARRAY_FILTER_USE_KEY
                );
                $this->invoke($handler, $params);
                return;
            }
        }

        echo (new ErrorController())->notFound();
    }

    private function invoke(array $handler, array $params): void
    {
        [$class, $action] = $handler;
        $controller = new $class();
        echo $controller->$action(...array_values($params));
    }

    private function normalize(string $path): string
    {
        $path = '/' . trim($path, '/');
        return $path === '/' ? '/' : rtrim($path, '/');
    }
}

<?php

declare(strict_types=1);

require dirname(__DIR__) . '/bootstrap.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('X-XSS-Protection: 1; mode=block');

try {
    /** @var App\Core\Router $router */
    $router = require BASE_PATH . '/routes/web.php';

    $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
    $uri = $_SERVER['REQUEST_URI'] ?? '/';

    // Strip base path when app is in subdirectory
    $scriptName = dirname($_SERVER['SCRIPT_NAME'] ?? '');
    if ($scriptName !== '/' && str_starts_with($uri, $scriptName)) {
        $uri = substr($uri, strlen($scriptName)) ?: '/';
    }

    $router->dispatch($method, $uri);
} catch (Throwable $e) {
    logger($e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(), 'error');

    if (config('app.debug')) {
        throw $e;
    }

    http_response_code(500);
    echo (new App\Controllers\ErrorController())->serverError();
}

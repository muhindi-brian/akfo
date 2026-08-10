<?php

declare(strict_types=1);

function env(string $key, mixed $default = null): mixed
{
    $value = $_ENV[$key] ?? getenv($key);
    if ($value === false || $value === null) {
        return $default;
    }

    return match (strtolower((string) $value)) {
        'true', '(true)' => true,
        'false', '(false)' => false,
        'null', '(null)' => null,
        default => $value,
    };
}

function config(string $key, mixed $default = null): mixed
{
    static $configs = [];

    [$file, $item] = array_pad(explode('.', $key, 2), 2, null);

    if (!isset($configs[$file])) {
        $path = BASE_PATH . "/config/{$file}.php";
        $configs[$file] = is_file($path) ? require $path : [];
    }

    if ($item === null) {
        return $configs[$file];
    }

    return $configs[$file][$item] ?? $default;
}

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function url(string $path = ''): string
{
    $base = rtrim(config('app.url'), '/');
    $path = $path === '' ? '' : '/' . ltrim($path, '/');

    return $base . $path;
}

function absolute_url(string $path): string
{
    if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
        return $path;
    }

    return url($path);
}

function request_path(): string
{
    $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $scriptName = dirname($_SERVER['SCRIPT_NAME'] ?? '');

    if ($scriptName !== '/' && $scriptName !== '\\' && str_starts_with($uri, $scriptName)) {
        $uri = substr($uri, strlen($scriptName)) ?: '/';
    }

    return $uri === '' ? '/' : $uri;
}

function asset(string $path): string
{
    return url('assets/' . ltrim($path, '/'));
}

function old(string $key, mixed $default = ''): mixed
{
    return $_SESSION['_old_input'][$key] ?? $default;
}

function csrf_token(): string
{
    if (empty($_SESSION['_csrf_token'])) {
        $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['_csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="_token" value="' . e(csrf_token()) . '">';
}

function verify_csrf(?string $token): bool
{
    return isset($_SESSION['_csrf_token'])
        && is_string($token)
        && hash_equals($_SESSION['_csrf_token'], $token);
}

function flash(string $key, mixed $value = null): mixed
{
    if ($value !== null) {
        $_SESSION['_flash'][$key] = $value;
        return null;
    }

    $stored = $_SESSION['_flash'][$key] ?? null;
    unset($_SESSION['_flash'][$key]);

    return $stored;
}

function redirect(string $path, int $status = 302): never
{
    header('Location: ' . url($path), true, $status);
    exit;
}

function data(string $file): array
{
    static $cache = [];
    if (!isset($cache[$file])) {
        $path = BASE_PATH . "/resources/data/{$file}.php";
        $cache[$file] = is_file($path) ? require $path : [];
    }

    return $cache[$file];
}

function view(string $name, array $data = []): string
{
    return App\Core\View::render($name, $data);
}

function logger(string $message, string $level = 'info'): void
{
    $dir = BASE_PATH . '/storage/logs';
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    $line = sprintf(
        "[%s] %s: %s\n",
        date('Y-m-d H:i:s'),
        strtoupper($level),
        $message
    );

    file_put_contents($dir . '/app.log', $line, FILE_APPEND | LOCK_EX);
}

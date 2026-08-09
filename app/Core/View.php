<?php

declare(strict_types=1);

namespace App\Core;

final class View
{
    public static function render(string $name, array $data = []): string
    {
        $path = BASE_PATH . '/resources/views/' . str_replace('.', '/', $name) . '.php';

        if (!is_file($path)) {
            throw new \RuntimeException("View [{$name}] not found.");
        }

        extract($data, EXTR_SKIP);

        ob_start();
        include $path;
        return (string) ob_get_clean();
    }

    public static function component(string $name, array $data = []): string
    {
        return self::render('components/' . $name, $data);
    }
}

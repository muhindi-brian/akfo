<?php

declare(strict_types=1);

return [
    'name' => env('APP_NAME', 'Agnes Kagure Foundation'),
    'url' => rtrim(env('APP_URL', 'http://localhost/stitch_agnes_kagure_foundation_portal'), '/'),
    'env' => env('APP_ENV', 'local'),
    'debug' => filter_var(env('APP_DEBUG', 'true'), FILTER_VALIDATE_BOOLEAN),
    'timezone' => env('APP_TIMEZONE', 'Africa/Nairobi'),
    'locale' => env('APP_LOCALE', 'en'),
    'key' => env('APP_KEY', 'change-this-to-a-random-32-char-string'),
];

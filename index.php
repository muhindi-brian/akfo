<?php

declare(strict_types=1);

/**
 * Root front controller — allows the site to run without /public in the URL.
 * Apache/Nginx should point here or rewrite all requests to this file.
 */
require __DIR__ . '/public/index.php';

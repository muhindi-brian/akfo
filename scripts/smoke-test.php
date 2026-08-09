#!/usr/bin/env php
<?php

declare(strict_types=1);

$base = dirname(__DIR__);
$paths = [
    '/',
    '/about',
    '/programs',
    '/impact',
    '/news',
    '/news/gbv-campaign-nairobi-2024',
    '/partners',
    '/contact',
    '/donate',
    '/get-involved',
    '/events',
    '/gallery',
    '/privacy',
    '/terms',
    '/robots.txt',
    '/sitemap.xml',
    '/missing-page',
];

foreach ($paths as $path) {
    $cmd = escapeshellarg('/Applications/XAMPP/xamppfiles/bin/php') . ' -r ' . escapeshellarg(
        '$_SERVER["REQUEST_METHOD"]="GET";'
        . '$_SERVER["REQUEST_URI"]=' . var_export($path, true) . ';'
        . '$_SERVER["SCRIPT_NAME"]="/index.php";'
        . 'ob_start();'
        . 'include ' . var_export($base . '/index.php', true) . ';'
        . '$_SERVER["SCRIPT_NAME"]="/stitch_agnes_kagure_foundation_portal/index.php";'
        . '$o=ob_get_clean();'
        . 'preg_match("/<title>(.*?)<\\/title>/",$o,$m);'
        . 'echo ' . var_export($path, true) . '." | HTTP ".http_response_code()." | ".($m[1]??"no title")." | bytes=".strlen($o).PHP_EOL;'
    );
    passthru($cmd);
}

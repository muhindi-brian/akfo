#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * SEO audit — run after changing resources/data/seo.php or layout SEO components.
 *
 * Usage:
 *   php scripts/seo-audit.php
 *   php scripts/seo-audit.php --json
 *   php scripts/seo-audit.php --production
 */

$base = dirname(__DIR__);
$argv = $argv ?? [];
$asJson = in_array('--json', $argv, true);
$production = in_array('--production', $argv, true);
$phpBin = PHP_BINARY;
$basePath = '/stitch_agnes_kagure_foundation_portal';
$productionBase = 'https://agneskagurefoundation.org';

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
];

$results = [];
$issues = [];

foreach ($paths as $path) {
    $html = $production
        ? fetchUrl($productionBase . ($path === '/' ? '/' : $path))
        : renderPath($phpBin, $base, $path, $basePath);
    $results[$path] = analyseHtml($html, $path, $production);
}

$robots = $production ? fetchUrl($productionBase . '/robots.txt') : renderPath($phpBin, $base, '/robots.txt', $basePath);
$sitemap = $production ? fetchUrl($productionBase . '/sitemap.xml') : renderPath($phpBin, $base, '/sitemap.xml', $basePath);
$notFound = $production ? fetchUrl($productionBase . '/missing-page-test') : renderPath($phpBin, $base, '/missing-page', $basePath);

$results['_robots'] = analyseRobots($robots);
$results['_sitemap'] = analyseSitemap($sitemap);
$results['_404'] = analyseHtml($notFound, '/missing-page');

foreach ($results as $path => $data) {
    if ($path === '_robots' || $path === '_sitemap') {
        continue;
    }
    foreach ($data['warnings'] as $warning) {
        $issues[] = ($path === '_404' ? '404 page' : $path) . ': ' . $warning;
    }
}

if ($asJson) {
    echo json_encode(['production' => $production, 'pages' => $results, 'issues' => $issues], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit($issues === [] ? 0 : 1);
}

printReport($results, $issues, $robots, $sitemap, $production);
exit($issues === [] ? 0 : 1);

function fetchUrl(string $url): string
{
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'follow_location' => 1,
            'max_redirects' => 5,
            'timeout' => 20,
            'header' => "User-Agent: AKFO-SEO-Audit/1.0\r\n",
        ],
        'ssl' => [
            'verify_peer' => true,
            'verify_peer_name' => true,
        ],
    ]);

    $body = @file_get_contents($url, false, $context);

    return is_string($body) ? $body : '';
}

function renderPath(string $phpBin, string $base, string $path, string $basePath): string
{
    $requestUri = $basePath . ($path === '/' ? '/' : $path);

    $code = <<<'PHP'
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = %s;
$_SERVER['SCRIPT_NAME'] = %s;
$_SERVER['HTTPS'] = 'off';
ob_start();
include %s;
echo ob_get_clean();
PHP;

    $snippet = sprintf(
        $code,
        var_export($requestUri, true),
        var_export($basePath . '/index.php', true),
        var_export($base . '/index.php', true),
    );

    return (string) shell_exec($phpBin . ' -r ' . escapeshellarg($snippet) . ' 2>/dev/null');
}

/** @return array<string, mixed> */
function analyseHtml(string $html, string $path, bool $production = false): array
{
    $warnings = [];

    if ($html === '') {
        return [
            'title' => '',
            'title_len' => 0,
            'description' => '',
            'desc_len' => 0,
            'canonical' => '',
            'robots' => '',
            'json_ld' => 0,
            'h1' => 0,
            'http_status' => 0,
            'warnings' => ['Empty response body — page unreachable'],
        ];
    }

    preg_match('/<title>(.*?)<\/title>/s', $html, $titleMatch);
    preg_match('/<meta name="description" content="([^"]*)"/', $html, $descMatch);
    preg_match('/<link rel="canonical" href="([^"]*)"/', $html, $canonicalMatch);
    preg_match('/<meta name="robots" content="([^"]*)"/', $html, $robotsMatch);
    preg_match('/<html[^>]*lang="([^"]*)"/', $html, $langMatch);

    $title = html_entity_decode($titleMatch[1] ?? '', ENT_QUOTES | ENT_HTML5);
    $description = html_entity_decode($descMatch[1] ?? '', ENT_QUOTES | ENT_HTML5);
    $canonical = $canonicalMatch[1] ?? '';
    $robots = $robotsMatch[1] ?? '';
    $lang = $langMatch[1] ?? '';

    $titleLen = strlen($title);
    $descLen = strlen($description);

    if ($title === '') {
        $warnings[] = 'Missing <title>';
    } elseif ($titleLen > 60) {
        $warnings[] = "Title too long ({$titleLen} chars; aim for ≤60)";
    }

    if ($description === '') {
        $warnings[] = 'Missing meta description';
    } elseif ($descLen > 160) {
        $warnings[] = "Description too long ({$descLen} chars; aim for ≤160)";
    } elseif ($descLen < 70 && $path !== '/missing-page') {
        $warnings[] = "Description short ({$descLen} chars; aim for 120–160)";
    }

    if ($canonical === '') {
        $warnings[] = 'Missing canonical URL';
    } elseif (substr_count($canonical, 'stitch_agnes_kagure_foundation_portal') > 1) {
        $warnings[] = 'Canonical URL has duplicated base path';
    }

    $ogTags = ['og:title', 'og:description', 'og:url', 'og:image'];
    foreach ($ogTags as $tag) {
        if (!preg_match('/property="' . preg_quote($tag, '/') . '"/', $html)) {
            $warnings[] = "Missing {$tag}";
        }
    }

    if ($lang !== 'en-KE') {
        $warnings[] = "Expected lang=\"en-KE\", got \"{$lang}\"";
    }

    $jsonLdCount = preg_match_all('/type="application\/ld\+json"/', $html);
    if ($jsonLdCount === 0 && $path !== '/missing-page') {
        $warnings[] = 'No JSON-LD structured data found';
    }

    $h1Count = preg_match_all('/<h1[\s>]/', $html);
    if ($path !== '/missing-page' && $h1Count !== 1) {
        $warnings[] = "Expected 1 <h1>, found {$h1Count}";
    }

    if ($path === '/missing-page' && !str_contains($robots, 'noindex')) {
        $warnings[] = '404 page should have noindex';
    }

    if (str_contains($html, 'href="#"')) {
        $warnings[] = 'Contains placeholder href="#" links';
    }

    $imgCount = preg_match_all('/<img\b/i', $html);
    $imgAltCount = preg_match_all('/<img[^>]*\salt=/i', $html);
    if ($imgCount > 0 && $imgAltCount < $imgCount) {
        $warnings[] = "{$imgCount} images but only {$imgAltCount} have alt text";
    }

    if ($production && $path !== '/missing-page-test' && !str_contains($html, 'en-KE')) {
        $warnings[] = 'Production may be running an older build (missing lang=en-KE or latest SEO)';
    }

    return [
        'title' => $title,
        'title_len' => $titleLen,
        'description' => $description,
        'desc_len' => $descLen,
        'canonical' => $canonical,
        'robots' => $robots,
        'json_ld' => $jsonLdCount,
        'h1' => $h1Count,
        'warnings' => $warnings,
    ];
}

/** @return array<string, mixed> */
function analyseRobots(string $body): array
{
    $warnings = [];
    if (!str_contains($body, 'User-agent:')) {
        $warnings[] = 'Invalid robots.txt';
    }
    if (!str_contains($body, 'Sitemap:')) {
        $warnings[] = 'robots.txt missing Sitemap directive';
    }
    if (!str_contains($body, 'Disallow: /storage/')) {
        $warnings[] = 'robots.txt should disallow /storage/';
    }

    return ['body' => trim($body), 'warnings' => $warnings];
}

/** @return array<string, mixed> */
function analyseSitemap(string $xml): array
{
    $warnings = [];
    $urlCount = substr_count($xml, '<url>');
    $newsCount = count(data('news'));
    $pageCount = count(data('seo')['pages']);
    $expectedMin = $pageCount + $newsCount;

    if ($urlCount < $expectedMin) {
        $warnings[] = "Sitemap has {$urlCount} URLs; expected at least {$expectedMin}";
    }
    if (!str_contains($xml, '<lastmod>')) {
        $warnings[] = 'Sitemap missing lastmod entries';
    }
    if (!str_contains($xml, '<priority>')) {
        $warnings[] = 'Sitemap missing priority entries';
    }

    return ['url_count' => $urlCount, 'expected_min' => $expectedMin, 'warnings' => $warnings];
}

/** @param array<string, mixed> $results */
function printReport(array $results, array $issues, string $robots, string $sitemap, bool $production = false): void
{
    echo "AKFO SEO Audit" . ($production ? ' (PRODUCTION)' : ' (LOCAL)') . "\n";
    echo str_repeat('=', 72) . "\n\n";

    echo sprintf(
        "%-28s %5s %5s %3s %3s %s\n",
        'PATH',
        'TITLE',
        'DESC',
        'LD',
        'H1',
        'STATUS',
    );
    echo str_repeat('-', 72) . "\n";

    foreach ($results as $path => $data) {
        if ($path === '_robots' || $path === '_sitemap' || $path === '_404') {
            continue;
        }
        $status = $data['warnings'] === [] ? 'OK' : 'WARN';
        echo sprintf(
            "%-28s %5d %5d %3d %3d %s\n",
            $path,
            $data['title_len'],
            $data['desc_len'],
            $data['json_ld'],
            $data['h1'],
            $status,
        );
    }

    echo "\nRobots.txt\n";
    echo str_repeat('-', 72) . "\n";
    echo trim($results['_robots']['body']) . "\n";

    echo "\nSitemap: {$results['_sitemap']['url_count']} URLs (min expected {$results['_sitemap']['expected_min']})\n";

    if ($issues !== []) {
        echo "\nWarnings (" . count($issues) . ")\n";
        echo str_repeat('-', 72) . "\n";
        foreach ($issues as $issue) {
            echo "  • {$issue}\n";
        }
        echo "\nFix copy in resources/data/seo.php or views, then re-run.\n";
    } else {
        echo "\nAll automated SEO checks passed.\n";
    }

    echo "\nNext manual steps: see SEO-CHECKLIST.md sections 4–7 (Search Console, social previews).\n";
}

function data(string $file): array
{
    static $cache = [];
    if (!isset($cache[$file])) {
        $path = dirname(__DIR__) . "/resources/data/{$file}.php";
        $cache[$file] = is_file($path) ? require $path : [];
    }

    return $cache[$file];
}

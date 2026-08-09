<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class SeoController extends Controller
{
    public function robots(): string
    {
        header('Content-Type: text/plain; charset=UTF-8');

        $lines = [
            'User-agent: *',
            'Allow: /',
            'Disallow: /storage/',
            'Disallow: /config/',
            'Disallow: /app/',
            '',
            'Sitemap: ' . url('/sitemap.xml'),
        ];

        return implode("\n", $lines);
    }

    public function sitemap(): string
    {
        header('Content-Type: application/xml; charset=UTF-8');

        $paths = [
            '/',
            '/about',
            '/programs',
            '/impact',
            '/news',
            '/partners',
            '/contact',
            '/donate',
            '/get-involved',
            '/events',
            '/gallery',
            '/privacy',
            '/terms',
        ];

        foreach (data('news') as $article) {
            $paths[] = '/news/' . $article['slug'];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($paths as $path) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>' . e(url(ltrim($path, '/'))) . "</loc>\n";
            $xml .= '    <changefreq>weekly</changefreq>' . "\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }
}

<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Services\SeoService;

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
            'Disallow: /resources/',
            'Disallow: /routes/',
            'Disallow: /scripts/',
            '',
            'Sitemap: ' . absolute_url('/sitemap.xml'),
        ];

        return implode("\n", $lines);
    }

    public function sitemap(): string
    {
        header('Content-Type: application/xml; charset=UTF-8');

        $entries = (new SeoService())->sitemapEntries();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($entries as $entry) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>' . htmlspecialchars($entry['loc'], ENT_XML1) . "</loc>\n";
            $xml .= '    <lastmod>' . htmlspecialchars($entry['lastmod'], ENT_XML1) . "</lastmod>\n";
            $xml .= '    <changefreq>' . htmlspecialchars($entry['changefreq'], ENT_XML1) . "</changefreq>\n";
            $xml .= '    <priority>' . htmlspecialchars($entry['priority'], ENT_XML1) . "</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }
}

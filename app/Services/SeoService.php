<?php

declare(strict_types=1);

namespace App\Services;

final class SeoService
{
    /**
     * Build the full SEO payload for the layout from path + controller overrides.
     *
     * @param array<string, mixed> $overrides
     * @return array<string, mixed>
     */
    public function resolve(string $path, array $overrides = []): array
    {
        $path = $this->normalizePath($path);
        $config = data('seo');
        $defaults = $config['defaults'];
        $page = $this->pageConfig($path, $config['pages']);

        $title = (string) ($overrides['pageTitle']
            ?? $this->formatTitle($page['title'] ?? $defaults['site_name'], $defaults['title_suffix']));

        $description = (string) ($overrides['pageDescription'] ?? $page['description'] ?? data('site')['description']);

        $image = $overrides['pageImage']
            ?? $page['og_image']
            ?? $defaults['og_image'];

        $robots = $overrides['pageRobots'] ?? $page['robots'] ?? $defaults['robots'];
        $ogType = $overrides['pageOgType'] ?? $page['og_type'] ?? $defaults['og_type'];
        $keywords = $overrides['pageKeywords'] ?? $page['keywords'] ?? $defaults['keywords'];

        $canonicalPath = $overrides['canonicalPath'] ?? $path;
        $canonical = absolute_url($canonicalPath === '/' ? '/' : $canonicalPath);

        $breadcrumb = $overrides['breadcrumb'] ?? $page['breadcrumb'] ?? [];
        if (!empty($overrides['article'])) {
            $breadcrumb = [
                ['name' => 'Stories', 'path' => '/news'],
                ['name' => $overrides['article']['title'], 'path' => '/news/' . $overrides['article']['slug']],
            ];
            $ogType = 'article';
        }

        $structuredData = $this->structuredData(
            $path,
            $canonical,
            $title,
            $description,
            absolute_url(is_string($image) ? $image : (string) $defaults['og_image']),
            $breadcrumb,
            $page['include_website_schema'] ?? false,
            $overrides['article'] ?? null,
        );

        return [
            'pageTitle' => $title,
            'pageDescription' => $description,
            'pageImage' => absolute_url(is_string($image) ? $image : (string) $defaults['og_image']),
            'pageKeywords' => $keywords,
            'pageRobots' => $robots,
            'pageOgType' => $ogType,
            'canonical' => $canonical,
            'canonicalPath' => $canonicalPath,
            'structuredData' => $structuredData,
            'article' => $overrides['article'] ?? null,
        ];
    }

    /**
     * @return list<array{loc: string, lastmod: string, changefreq: string, priority: string}>
     */
    public function sitemapEntries(): array
    {
        $config = data('seo');
        $entries = [];

        foreach ($config['pages'] as $path => $page) {
            $entries[] = [
                'loc' => absolute_url($path),
                'lastmod' => date('Y-m-d'),
                'changefreq' => $page['changefreq'] ?? 'weekly',
                'priority' => $page['priority'] ?? '0.5',
            ];
        }

        foreach (data('news') as $article) {
            $entries[] = [
                'loc' => absolute_url('/news/' . $article['slug']),
                'lastmod' => date('Y-m-d', strtotime($article['date'])),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ];
        }

        return $entries;
    }

    public function normalizePath(string $path): string
    {
        $path = parse_url($path, PHP_URL_PATH) ?: '/';
        $path = '/' . trim($path, '/');
        if ($path !== '/' && str_starts_with($path, '/news/')) {
            return $path;
        }

        return $path === '' ? '/' : $path;
    }

    /**
     * @param array<string, array<string, mixed>> $pages
     * @return array<string, mixed>
     */
    private function pageConfig(string $path, array $pages): array
    {
        if (isset($pages[$path])) {
            return $pages[$path];
        }

        if (str_starts_with($path, '/news/') && $path !== '/news') {
            return $pages['/news'] ?? [];
        }

        return [];
    }

    private function formatTitle(string $title, string $suffix): string
    {
        if (str_contains($title, 'Agnes Kagure Foundation') || str_contains($title, '|')) {
            return $title;
        }

        return $title . $suffix;
    }

    /**
     * @param list<array{name: string, path: string}> $breadcrumb
     * @return list<array<string, mixed>>
     */
    private function structuredData(
        string $path,
        string $canonical,
        string $title,
        string $description,
        string $image,
        array $breadcrumb,
        bool $includeWebsite,
        ?array $article,
    ): array {
        $site = data('site');
        $orgConfig = data('seo')['organization'];
        $baseUrl = rtrim(config('app.url'), '/');

        $graphs = [];

        $graphs[] = [
            '@context' => 'https://schema.org',
            '@type' => $orgConfig['@type'],
            '@id' => $baseUrl . '/#organization',
            'name' => $orgConfig['name'],
            'alternateName' => $orgConfig['alternateName'],
            'url' => $baseUrl,
            'logo' => absolute_url('/assets/images/favicon.svg'),
            'description' => $orgConfig['description'],
            'email' => $site['email'],
            'telephone' => $site['phone'],
            'foundingDate' => $orgConfig['foundingDate'],
            'areaServed' => $orgConfig['areaServed'],
            'knowsAbout' => $orgConfig['knowsAbout'],
            'sameAs' => array_values(array_filter(array_map(
                static fn (array $social): ?string => str_starts_with($social['url'], 'http') ? $social['url'] : null,
                $site['social'],
            ))),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $site['address']['line1'],
                'addressLocality' => $site['address']['line2'],
                'addressCountry' => $site['address']['city'],
            ],
        ];

        if ($includeWebsite) {
            $graphs[] = [
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                '@id' => $baseUrl . '/#website',
                'url' => $baseUrl,
                'name' => $site['name'],
                'description' => $site['description'],
                'publisher' => ['@id' => $baseUrl . '/#organization'],
                'inLanguage' => 'en-KE',
                'potentialAction' => [
                    '@type' => 'SearchAction',
                    'target' => $baseUrl . '/news?q={search_term_string}',
                    'query-input' => 'required name=search_term_string',
                ],
            ];
        }

        if ($breadcrumb !== []) {
            $items = [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => $baseUrl . '/',
                ],
            ];

            foreach ($breadcrumb as $index => $crumb) {
                $items[] = [
                    '@type' => 'ListItem',
                    'position' => $index + 2,
                    'name' => $crumb['name'],
                    'item' => absolute_url($crumb['path']),
                ];
            }

            $graphs[] = [
                '@context' => 'https://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => $items,
            ];
        }

        if ($article !== null) {
            $graphs[] = [
                '@context' => 'https://schema.org',
                '@type' => 'NewsArticle',
                'headline' => $article['title'],
                'description' => $article['excerpt'],
                'image' => [$article['image']],
                'datePublished' => date('c', strtotime($article['date'])),
                'dateModified' => date('c', strtotime($article['date'])),
                'author' => [
                    '@type' => 'Organization',
                    'name' => $site['name'],
                    'url' => $baseUrl,
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => $site['name'],
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => absolute_url('/assets/images/favicon.svg'),
                    ],
                ],
                'mainEntityOfPage' => [
                    '@type' => 'WebPage',
                    '@id' => $canonical,
                ],
                'articleSection' => $article['category'],
                'inLanguage' => 'en-KE',
            ];
        } elseif ($path !== '/') {
            $graphs[] = [
                '@context' => 'https://schema.org',
                '@type' => 'WebPage',
                '@id' => $canonical . '#webpage',
                'url' => $canonical,
                'name' => $title,
                'description' => $description,
                'isPartOf' => ['@id' => $baseUrl . '/#website'],
                'about' => ['@id' => $baseUrl . '/#organization'],
                'inLanguage' => 'en-KE',
                'primaryImageOfPage' => [
                    '@type' => 'ImageObject',
                    'url' => $image,
                ],
            ];
        }

        return $graphs;
    }
}

<?php

declare(strict_types=1);

require __DIR__ . '/../bootstrap.php';

$mapping = [
    'home' => 'home_agnes_kagure_foundation',
    'about' => 'about_us_agnes_kagure_foundation',
    'programs' => 'our_programs_agnes_kagure_foundation',
    'impact' => 'our_impact_agnes_kagure_foundation',
    'news' => 'news_stories_agnes_kagure_foundation',
    'partners' => 'partners_alliances_agnes_kagure_foundation',
    'contact' => 'contact_us_agnes_kagure_foundation',
    'donate' => 'donate_agnes_kagure_foundation',
    'get-involved' => 'get_involved_agnes_kagure_foundation',
    'events' => 'events_calendar_agnes_kagure_foundation',
    'gallery' => 'image_video_gallery_agnes_kagure_foundation',
];

$outDir = BASE_PATH . '/resources/views/partials/stitch';
if (!is_dir($outDir)) {
    mkdir($outDir, 0755, true);
}

foreach ($mapping as $slug => $folder) {
    $file = BASE_PATH . "/google_stitch/{$folder}/code.html";
    if (!is_file($file)) {
        echo "Missing: {$file}\n";
        continue;
    }

    $html = file_get_contents($file);
    $content = extractMainContent($html);

    if ($content === null) {
        echo "Failed to extract: {$slug}\n";
        continue;
    }

    $content = transformLinks($content);

    file_put_contents("{$outDir}/{$slug}.php", "<?php\n// Auto-extracted from Google Stitch design\n?>\n" . $content);
    echo "Extracted: {$slug} (" . strlen($content) . " bytes)\n";
}

echo "Done.\n";

function extractMainContent(string $html): ?string
{
    $content = null;

    // Prefer explicit main wrapper
    if (preg_match('/<main[^>]*>(.*?)<\/main>/s', $html, $matches)) {
        $content = trim($matches[1]);
    } elseif (preg_match('/<(?:header|nav)[^>]*class="[^"]*sticky[^"]*"[^>]*>/s', $html, $navMatch, PREG_OFFSET_CAPTURE)) {
        $searchFrom = $navMatch[0][1];
        $tag = str_starts_with($navMatch[0][0], '<header') ? 'header' : 'nav';

        if (!preg_match('/<\/' . $tag . '>/s', $html, $closeMatch, PREG_OFFSET_CAPTURE, $searchFrom)) {
            return null;
        }

        $start = $closeMatch[0][1] + strlen($closeMatch[0][0]);

        if (!preg_match('/<footer/s', $html, $footerMatch, PREG_OFFSET_CAPTURE, $start)) {
            if (preg_match('/<\/body>/s', $html, $bodyMatch, PREG_OFFSET_CAPTURE, $start)) {
                $end = $bodyMatch[0][1];
            } else {
                return null;
            }
        } else {
            $end = $footerMatch[0][1];
        }

        $content = trim(substr($html, $start, $end - $start));
    }

    if ($content === null) {
        return null;
    }

    return stripEmbeddedFooters($content);
}

function stripEmbeddedFooters(string $content): string
{
    // Remove any footer blocks accidentally included in page partials
    $content = preg_replace('/<!--\s*Footer[^>]*-->\s*/i', '', $content);
    $content = preg_replace('/<footer\b[^>]*>.*?<\/footer>/s', '', $content);

    return trim($content);
}

function transformLinks(string $content): string
{
    $routes = [
        'About' => url('/about'),
        'Programs' => url('/programs'),
        'Impact Stories' => url('/impact'),
        'Partners' => url('/partners'),
        'Contact' => url('/contact'),
        'Donate Now' => url('/donate'),
        'Donate' => url('/donate'),
        'Become a Volunteer' => url('/get-involved#volunteer'),
        'Partner With Us' => url('/partners'),
        'View All Programs' => url('/programs'),
        'Contact Partnerships' => url('/contact'),
        'Start Your Donation' => url('/donate'),
        'About Us' => url('/about'),
        'Contact Us' => url('/contact'),
        'Privacy Policy' => url('/privacy'),
        'Terms of Service' => url('/terms'),
        'Newsletter Sign-up' => url('/get-involved'),
        'Volunteer Opportunities' => url('/get-involved#volunteer'),
        'Corporate Partnership' => url('/partners'),
        'Contact Support' => url('/contact'),
        'Financial Transparency' => url('/about#governance'),
        'Impact Reports' => url('/impact'),
        'Our Team' => url('/about#leadership'),
        'Learn More' => url('/programs'),
    ];

    foreach ($routes as $label => $href) {
        $content = preg_replace(
            '/href="#([^"]*)">' . preg_quote($label, '/') . '/',
            'href="' . $href . '">' . $label,
            $content
        );
        $content = str_replace('href="#">' . $label, 'href="' . $href . '">' . $label, $content);
    }

    // Convert buttons that should be links
    $content = str_replace(
        '<button class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-bold text-label-bold hover:shadow-lg active:scale-95 duration-200 transition-all">
                    Donate
                </button>',
        '<a href="' . url('/donate') . '" class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-bold text-label-bold hover:shadow-lg active:scale-95 duration-200 transition-all inline-block">Donate</a>',
        $content
    );

    return $content;
}

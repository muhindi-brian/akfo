<?php

declare(strict_types=1);

/** @var string $content */
/** @var string $pageTitle */
/** @var string $pageDescription */
/** @var string|null $pageImage */
/** @var array|null $pageStyles */
/** @var array|null $pageScripts */
/** @var array $site */
/** @var array $navigation */
/** @var string $currentPath */

$pageTitle = $pageTitle ?? $site['name'];
$pageDescription = $pageDescription ?? $site['description'];
$pageImage = $pageImage ?? asset('images/og-default.jpg');
$canonical = url(ltrim($currentPath, '/') ?: '/');
$pageStyles = $pageStyles ?? [];
$pageScripts = $pageScripts ?? [];
?>
<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>"/>
    <link rel="canonical" href="<?= e($canonical) ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?= e($pageTitle) ?>"/>
    <meta property="og:description" content="<?= e($pageDescription) ?>"/>
    <meta property="og:url" content="<?= e($canonical) ?>"/>
    <meta property="og:image" content="<?= e($pageImage) ?>"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="<?= e($pageTitle) ?>"/>
    <meta name="twitter:description" content="<?= e($pageDescription) ?>"/>
    <meta name="twitter:image" content="<?= e($pageImage) ?>"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="stylesheet" href="<?= asset('css/variables.css') ?>"/>
    <link rel="stylesheet" href="<?= asset('css/base.css') ?>"/>
    <link rel="stylesheet" href="<?= asset('css/components.css') ?>"/>
    <link rel="stylesheet" href="<?= asset('css/navigation.css') ?>"/>
    <link rel="stylesheet" href="<?= asset('css/responsive.css') ?>"/>
    <link rel="stylesheet" href="<?= asset('css/motion.css') ?>"/>
    <?php foreach ($pageStyles as $style): ?>
        <link rel="stylesheet" href="<?= asset('css/pages/' . $style) ?>"/>
    <?php endforeach; ?>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: <?= json_encode(require BASE_PATH . '/resources/data/design-colors.php', JSON_THROW_ON_ERROR) ?>,
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                    spacing: {
                        unit: "8px",
                        "container-max": "1280px",
                        "margin-mobile": "20px",
                        "stack-md": "24px",
                        "stack-lg": "48px",
                        "stack-sm": "12px",
                        "section-padding": "120px",
                        gutter: "32px"
                    },
                    fontFamily: {
                        "headline-md": ["EB Garamond", "serif"],
                        "headline-lg": ["EB Garamond", "serif"],
                        "display-lg-mobile": ["EB Garamond", "serif"],
                        "display-lg": ["EB Garamond", "serif"],
                        "body-lg": ["Plus Jakarta Sans", "sans-serif"],
                        "stats-lg": ["Plus Jakarta Sans", "sans-serif"],
                        "body-md": ["Plus Jakarta Sans", "sans-serif"],
                        "label-bold": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    fontSize: {
                        "headline-md": ["32px", { lineHeight: "40px", fontWeight: "500" }],
                        "headline-lg": ["40px", { lineHeight: "48px", fontWeight: "500" }],
                        "display-lg-mobile": ["40px", { lineHeight: "48px", letterSpacing: "-0.01em", fontWeight: "500" }],
                        "display-lg": ["64px", { lineHeight: "72px", letterSpacing: "-0.02em", fontWeight: "500" }],
                        "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
                        "stats-lg": ["48px", { lineHeight: "56px", letterSpacing: "-0.03em", fontWeight: "700" }],
                        "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }],
                        "label-bold": ["14px", { lineHeight: "20px", letterSpacing: "0.05em", fontWeight: "600" }]
                    }
                }
            }
        };
    </script>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-primary-fixed selection:text-on-primary-fixed-variant antialiased overflow-x-hidden">
<?= view('components.header', compact('site', 'navigation', 'currentPath')) ?>
<?= view('components.mobile-menu', compact('navigation', 'currentPath')) ?>

<main id="main-content">
    <?= $content ?>
</main>

<?= view('components.footer', compact('site', 'navigation')) ?>

<script src="<?= asset('js/main.js') ?>" defer></script>
<?php foreach ($pageScripts as $script): ?>
    <script src="<?= asset('js/' . $script) ?>" defer></script>
<?php endforeach; ?>
</body>
</html>

<?php

declare(strict_types=1);

/** @var string $pageTitle */
/** @var string $pageDescription */
/** @var string $pageImage */
/** @var string $pageKeywords */
/** @var string $pageRobots */
/** @var string $pageOgType */
/** @var string $canonical */
/** @var array|null $article */
/** @var list<array<string, mixed>> $structuredData */
/** @var array $site */

$seoDefaults = data('seo')['defaults'];
?>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>
<title><?= e($pageTitle) ?></title>
<meta name="description" content="<?= e($pageDescription) ?>"/>
<meta name="keywords" content="<?= e($pageKeywords) ?>"/>
<meta name="author" content="<?= e($site['name']) ?>"/>
<meta name="robots" content="<?= e($pageRobots) ?>"/>
<meta name="googlebot" content="<?= e($pageRobots) ?>"/>
<link rel="canonical" href="<?= e($canonical) ?>"/>
<link rel="alternate" hreflang="<?= e($seoDefaults['language']) ?>" href="<?= e($canonical) ?>"/>
<link rel="alternate" hreflang="x-default" href="<?= e($canonical) ?>"/>

<link rel="icon" href="<?= asset('images/favicon.svg') ?>" type="image/svg+xml"/>
<link rel="apple-touch-icon" href="<?= asset('images/favicon.svg') ?>"/>
<meta name="theme-color" content="#1B4332"/>

<?php if (($googleVerification = config('app.google_site_verification')) !== ''): ?>
<meta name="google-site-verification" content="<?= e($googleVerification) ?>"/>
<?php endif; ?>
<?php if (($bingVerification = config('app.bing_site_verification')) !== ''): ?>
<meta name="msvalidate.01" content="<?= e($bingVerification) ?>"/>
<?php endif; ?>

<meta property="og:locale" content="<?= e(str_replace('-', '_', $seoDefaults['language'])) ?>"/>
<meta property="og:type" content="<?= e($pageOgType) ?>"/>
<meta property="og:site_name" content="<?= e($seoDefaults['site_name']) ?>"/>
<meta property="og:title" content="<?= e($pageTitle) ?>"/>
<meta property="og:description" content="<?= e($pageDescription) ?>"/>
<meta property="og:url" content="<?= e($canonical) ?>"/>
<meta property="og:image" content="<?= e($pageImage) ?>"/>
<meta property="og:image:alt" content="<?= e($pageTitle) ?>"/>

<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:site" content="<?= e($seoDefaults['twitter_site']) ?>"/>
<meta name="twitter:title" content="<?= e($pageTitle) ?>"/>
<meta name="twitter:description" content="<?= e($pageDescription) ?>"/>
<meta name="twitter:image" content="<?= e($pageImage) ?>"/>
<meta name="twitter:image:alt" content="<?= e($pageTitle) ?>"/>

<?php if ($article !== null): ?>
<meta property="article:published_time" content="<?= e(date('c', strtotime($article['date']))) ?>"/>
<meta property="article:section" content="<?= e($article['category']) ?>"/>
<meta property="article:author" content="<?= e($site['name']) ?>"/>
<?php endif; ?>

<?php foreach ($structuredData as $graph): ?>
<script type="application/ld+json"><?= json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR) ?></script>
<?php endforeach; ?>

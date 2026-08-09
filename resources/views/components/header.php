<?php
/** @var array $site */
/** @var array $navigation */
/** @var string $currentPath */

$normalizePath = static function (string $path): string {
    $path = '/' . trim($path, '/');
    return $path === '/' ? '/' : rtrim($path, '/');
};

$current = $normalizePath(parse_url($currentPath, PHP_URL_PATH) ?: '/');

$isActive = static function (string $route) use ($normalizePath, $current): bool {
    return $normalizePath($route) === $current;
};
?>
<header class="site-header bg-surface/70 backdrop-blur-md shadow-sm sticky top-0 z-50 h-20" id="site-header">
    <div class="flex justify-between items-center w-full px-margin-mobile md:px-gutter max-w-container-max mx-auto h-full">
        <a href="<?= url('/') ?>" class="flex items-center gap-2 focus-visible:outline focus-visible:outline-2 focus-visible:outline-primary rounded-lg min-w-0 shrink">
            <span class="site-logo-text font-headline-md text-headline-md font-bold text-primary tracking-tight"><?= e($site['name']) ?></span>
        </a>

        <nav class="hidden lg:flex items-center gap-8" aria-label="Primary navigation">
            <?php foreach ($navigation['main'] as $item): ?>
                <?php $active = $isActive($item['route']); ?>
                <a
                    href="<?= url($item['url']) ?>"
                    class="font-body-md text-body-md transition-colors <?= $active ? 'text-primary font-bold border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' ?>"
                    <?= $active ? 'aria-current="page"' : '' ?>
                ><?= e($item['label']) ?></a>
            <?php endforeach; ?>
        </nav>

        <div class="flex items-center gap-4">
            <button type="button" class="hidden md:flex items-center gap-1 font-label-bold text-label-bold text-on-surface-variant px-3 py-1 rounded-full border border-outline-variant hover:bg-surface-container-high transition-colors" aria-label="Language: English">
                <span class="material-symbols-outlined text-[18px]" aria-hidden="true">language</span> EN
            </button>
            <a href="<?= url('/donate') ?>" class="header-donate bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-bold text-label-bold hover:shadow-lg btn-press shrink-0">Donate</a>
            <button type="button" class="lg:hidden text-primary p-2 rounded-lg hover:bg-surface-container-high transition-colors" id="mobile-menu-toggle" aria-expanded="false" aria-controls="mobile-menu" aria-label="Open menu">
                <span class="material-symbols-outlined text-[32px]" aria-hidden="true">menu</span>
            </button>
        </div>
    </div>
</header>

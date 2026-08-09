<?php
/** @var array $navigation */
/** @var string $currentPath */

$normalizePath = static function (string $path): string {
    $path = '/' . trim($path, '/');
    return $path === '/' ? '/' : rtrim($path, '/');
};

$current = $normalizePath(parse_url($currentPath, PHP_URL_PATH) ?: '/');
?>
<div id="mobile-menu" class="mobile-menu lg:hidden fixed inset-0 z-[60] pointer-events-none" aria-hidden="true">
    <div class="mobile-menu__backdrop absolute inset-0 bg-black/40 opacity-0" id="mobile-menu-backdrop"></div>
    <nav
        class="mobile-menu__panel absolute top-0 right-0 h-full w-[min(100%,320px)] bg-surface-container-lowest shadow-2xl translate-x-full p-6 flex flex-col"
        aria-label="Mobile navigation"
    >
        <div class="flex items-center justify-between mb-8">
            <span class="font-headline-md text-primary font-bold">Menu</span>
            <button type="button" id="mobile-menu-close" class="text-primary p-2 rounded-lg hover:bg-surface-container-high" aria-label="Close menu">
                <span class="material-symbols-outlined text-[28px]" aria-hidden="true">close</span>
            </button>
        </div>
        <ul class="flex flex-col gap-4">
            <?php foreach ($navigation['main'] as $item): ?>
                <?php $active = $normalizePath($item['route']) === $current; ?>
                <li>
                    <a
                        href="<?= url($item['url']) ?>"
                        class="block font-body-lg py-2 px-3 rounded-lg transition-colors <?= $active ? 'bg-primary/10 text-primary font-bold' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' ?>"
                        <?= $active ? 'aria-current="page"' : '' ?>
                    ><?= e($item['label']) ?></a>
                </li>
            <?php endforeach; ?>
            <li class="pt-4 border-t border-outline-variant/30">
                <a href="<?= url('/donate') ?>" class="block text-center bg-primary text-on-primary px-6 py-3 rounded-lg font-label-bold">Donate</a>
            </li>
            <li>
                <a href="<?= url('/get-involved') ?>" class="block text-center border border-primary text-primary px-6 py-3 rounded-lg font-label-bold mt-2">Get Involved</a>
            </li>
        </ul>
    </nav>
</div>

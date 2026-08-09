<?php
/** @var array $site */
/** @var array $navigation */
?>
<footer class="bg-surface-container-lowest pt-20 pb-12">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-mobile md:px-gutter max-w-container-max mx-auto">
        <div class="md:col-span-1">
            <a href="<?= url('/') ?>" class="font-headline-md text-headline-md font-bold text-primary mb-6 inline-block"><?= e($site['name']) ?></a>
            <p class="text-on-surface-variant font-body-md mb-8">Empowering marginalized communities through sustainable development and focused social intervention<?= !empty($site['founded']) ? ' since ' . (int) $site['founded'] : '' ?>.</p>
            <div class="flex gap-4">
                <?php foreach ($site['social'] as $social): ?>
                    <a href="<?= e($social['url']) ?>" class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all" aria-label="<?= e($social['label']) ?>">
                        <span class="material-symbols-outlined text-sm" aria-hidden="true"><?= e($social['icon']) ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div>
            <h4 class="font-label-bold text-label-bold text-primary mb-6 uppercase tracking-widest">Programs</h4>
            <ul class="space-y-4">
                <?php foreach ($navigation['footer']['programs'] as $link): ?>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="<?= url($link['url']) ?>"><?= e($link['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div>
            <h4 class="font-label-bold text-label-bold text-primary mb-6 uppercase tracking-widest">About Us</h4>
            <ul class="space-y-4">
                <?php foreach ($navigation['footer']['about'] as $link): ?>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="<?= url($link['url']) ?>"><?= e($link['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div>
            <h4 class="font-label-bold text-label-bold text-primary mb-6 uppercase tracking-widest">Get Involved</h4>
            <ul class="space-y-4">
                <?php foreach ($navigation['footer']['get_involved'] as $link): ?>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors" href="<?= url($link['url']) ?>"><?= e($link['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter mt-12 md:mt-20 pt-8 border-t border-surface-container-highest flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left">
        <p class="text-on-surface-variant text-sm">© <?= date('Y') ?> <?= e($site['name']) ?>. All rights reserved. Empowering communities through sustainable development.</p>
        <div class="flex gap-8 text-sm">
            <a class="text-on-surface-variant hover:text-primary transition-colors" href="<?= url('/privacy') ?>">Privacy Policy</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors" href="<?= url('/terms') ?>">Terms of Service</a>
        </div>
    </div>
</footer>

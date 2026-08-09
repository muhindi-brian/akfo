<?php
/** @var array $article */
?>
<section class="py-section-padding px-margin-mobile md:px-gutter max-w-container-max mx-auto">
    <article class="max-w-3xl mx-auto">
        <a href="<?= url('/news') ?>" class="inline-flex items-center gap-2 text-primary font-label-bold mb-8 hover:gap-3 transition-all">
            <span class="material-symbols-outlined">arrow_back</span> Back to Stories
        </a>
        <div class="flex items-center gap-3 text-on-surface-variant text-sm mb-4">
            <time datetime="<?= e($article['date']) ?>"><?= e(date('F j, Y', strtotime($article['date']))) ?></time>
            <span class="w-1 h-1 rounded-full bg-outline-variant"></span>
            <span><?= e($article['category']) ?></span>
        </div>
        <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-6 md:mb-8"><?= e($article['title']) ?></h1>
        <div class="aspect-video rounded-2xl overflow-hidden mb-10">
            <img src="<?= e($article['image']) ?>" alt="<?= e($article['title']) ?>" class="w-full h-full object-cover" loading="lazy"/>
        </div>
        <div class="font-body-lg text-body-lg text-on-surface-variant space-y-6 leading-relaxed">
            <?= $article['body'] ?>
        </div>
    </article>
</section>

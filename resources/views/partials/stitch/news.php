<?php
// Auto-extracted from Google Stitch design
?>
<!-- Hero Section -->
<section class="relative w-full min-h-[420px] md:h-[716px] akfo-hero flex items-end">
 <div class="absolute inset-0 bg-cover bg-center"role="img" aria-label="A cinematic, high-resolution photograph of a vibrant community center in Kenya, with local community members engaged in a positive discussion. The lighting is warm and golden, reflecting the late afternoon sun. The scene conveys a sense of hope, togetherness, and sustainable progress. The aesthetic is professional yet deeply human, utilizing a palette that highlights natural greens and earthy tones consistent with the Foundation's deep green brand identity." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD-G5xL9KwAaKLrJZ0yIBd4gI-4VzaDgnMouqovDA_PJBTkxDvncyZDYJY5G4YmQrWLyAhd3KEf_eskhsLnmCRfLYZAYFDecw5GCTFWVUfSCUFjRr1RnwCt1wo2C87DM_A7cqoskSpXP4sPsI461qgTunlg1-MK9UhjtTUuqEZuMMtNTkLwsmyFe2S60Imx9LEvFxB0g5Pn40JJpYIW6dXoTX41Arcfe9b0dDBmSuVZ4TydD6vzZHKyPQ')"></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
<div class="relative w-full max-w-container-max mx-auto px-margin-mobile md:px-gutter pb-stack-lg mb-stack-lg">
<span class="inline-block px-4 py-1 bg-secondary-container text-on-secondary-container rounded-full text-label-bold uppercase tracking-wider mb-stack-sm">Featured Impact</span>
<h1 class="font-display-lg text-white max-w-3xl mb-stack-md">Stories of Change from AKFO</h1>
<p class="font-body-lg text-white/90 max-w-2xl mb-stack-md">Real updates on scholarships, GBV prevention, youth empowerment, and community welfare programmes across Nairobi.</p>
<?php $featured = ($articles ?? data('news'))[0] ?? null; ?>
<?php if ($featured): ?>
<a href="<?= url('/news/' . $featured['slug']) ?>" class="bg-white text-primary px-8 py-3.5 rounded-lg font-label-bold hover:bg-surface-container-lowest transition-all flex items-center gap-2 inline-flex">
                    Read the Full Story <span class="material-symbols-outlined">arrow_forward</span>
</a>
<?php endif; ?>
</div>
</section>
<!-- Category Navigation & Search -->
<section class="py-stack-lg bg-surface-container-lowest border-b border-outline-variant/30">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter flex flex-col md:flex-row justify-between items-center gap-stack-md">
<div class="flex flex-wrap gap-stack-sm justify-center overflow-x-auto akfo-scroll-row pb-2 md:pb-0">
<a href="<?= url('/news') ?>" class="px-6 py-2 rounded-full bg-primary text-on-primary font-label-bold transition-all inline-flex">All Stories</a>
<a href="<?= url('/news') ?>" class="px-6 py-2 rounded-full bg-surface-container-high text-on-surface-variant hover:bg-primary/10 hover:text-primary font-label-bold transition-all inline-flex">Education</a>
<a href="<?= url('/news') ?>" class="px-6 py-2 rounded-full bg-surface-container-high text-on-surface-variant hover:bg-primary/10 hover:text-primary font-label-bold transition-all inline-flex">Healthcare</a>
<a href="<?= url('/news') ?>" class="px-6 py-2 rounded-full bg-surface-container-high text-on-surface-variant hover:bg-primary/10 hover:text-primary font-label-bold transition-all inline-flex">Women Empowerment</a>
<a href="<?= url('/news') ?>" class="px-6 py-2 rounded-full bg-surface-container-high text-on-surface-variant hover:bg-primary/10 hover:text-primary font-label-bold transition-all inline-flex">Youth Skills</a>
<a href="<?= url('/news') ?>" class="px-6 py-2 rounded-full bg-surface-container-high text-on-surface-variant hover:bg-primary/10 hover:text-primary font-label-bold transition-all inline-flex">Press Releases</a>
</div>
<div class="relative w-full md:w-64">
<input class="w-full bg-surface-container-low border-none rounded-full px-6 py-2 focus:ring-2 focus:ring-primary/20 text-body-md placeholder:text-on-surface-variant/50" placeholder="Search stories..." type="text"/>
<span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant/50">search</span>
</div>
</div>
</section>
<!-- Main Stories Grid -->
<section class="py-section-padding">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Primary Featured Card -->
<div class="lg:col-span-8 flex flex-col gap-stack-md">
<?php $featured = ($articles ?? data('news'))[0] ?? null; ?>
<?php if ($featured): ?>
<a href="<?= url('/news/' . $featured['slug']) ?>" class="group cursor-pointer overflow-hidden rounded-xl bg-white shadow-sm hover:shadow-md transition-all block">
<div class="relative aspect-video overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="<?= e($featured['title']) ?>" src="<?= e($featured['image']) ?>"/>
<div class="absolute top-4 right-4 glass-panel px-4 py-1 rounded-full text-label-bold text-primary"><?= e($featured['category']) ?></div>
</div>
<div class="p-stack-md">
<div class="flex items-center gap-2 text-on-surface-variant text-label-bold mb-2">
<span class="material-symbols-outlined text-[18px]">calendar_today</span> <?= e(date('F j, Y', strtotime($featured['date']))) ?>
                                </div>
<h2 class="font-headline-lg text-primary mb-stack-sm leading-tight"><?= e($featured['title']) ?></h2>
<p class="font-body-lg text-on-surface-variant mb-stack-md line-clamp-3"><?= e($featured['excerpt']) ?></p>
<span class="inline-flex items-center gap-2 font-label-bold text-primary group-hover:gap-3 transition-all">
                                    Read Full Story <span class="material-symbols-outlined">arrow_forward</span>
</span>
</div>
</a>
<?php endif; ?>
</div>
<!-- Upcoming Events Sidebar -->
<aside class="lg:col-span-4">
<div class="bg-surface-container-low p-stack-md rounded-xl sticky top-28">
<h3 class="font-headline-md text-primary mb-stack-md">Upcoming Events</h3>
<div class="space-y-stack-md">
<a href="<?= url('/events') ?>" class="flex gap-4 items-start p-stack-sm rounded-lg hover:bg-white transition-colors border border-transparent hover:border-outline-variant/20">
<div class="flex-shrink-0 w-12 h-12 bg-primary-container text-on-primary-container rounded-lg flex flex-col items-center justify-center font-label-bold">
<span class="text-[12px]">OCT</span>
<span class="text-lg">22</span>
</div>
<div>
<h4 class="font-label-bold text-on-surface">Community Health Drive</h4>
<p class="text-body-md text-on-surface-variant">Kibera Town Hall, 9:00 AM</p>
</div>
</a>
<a href="<?= url('/events') ?>" class="flex gap-4 items-start p-stack-sm rounded-lg hover:bg-white transition-colors border border-transparent hover:border-outline-variant/20">
<div class="flex-shrink-0 w-12 h-12 bg-primary-container text-on-primary-container rounded-lg flex flex-col items-center justify-center font-label-bold">
<span class="text-[12px]">NOV</span>
<span class="text-lg">05</span>
</div>
<div>
<h4 class="font-label-bold text-on-surface">Women in Leadership Forum</h4>
<p class="text-body-md text-on-surface-variant">Nairobi Convention Center</p>
</div>
</a>
<a href="<?= url('/events') ?>" class="flex gap-4 items-start p-stack-sm rounded-lg hover:bg-white transition-colors border border-transparent hover:border-outline-variant/20">
<div class="flex-shrink-0 w-12 h-12 bg-primary-container text-on-primary-container rounded-lg flex flex-col items-center justify-center font-label-bold">
<span class="text-[12px]">NOV</span>
<span class="text-lg">12</span>
</div>
<div>
<h4 class="font-label-bold text-on-surface">Agriculture Tech Workshop</h4>
<p class="text-body-md text-on-surface-variant">Virtual &amp; Nakuru Campus</p>
</div>
</a>
</div>
<a href="<?= url('/events') ?>" class="w-full mt-stack-md border border-primary text-primary py-2.5 rounded-lg font-label-bold hover:bg-primary hover:text-on-primary transition-all inline-flex justify-center">View All Events</a>
</div>
</aside>
</div>
<!-- Secondary Story Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter mt-gutter">
<?php foreach (array_slice(($articles ?? data('news')), 1, 3) as $article): ?>
<a href="<?= url('/news/' . $article['slug']) ?>" class="group card-hover bg-white rounded-xl overflow-hidden transition-all duration-300 block">
<div class="relative h-56 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="<?= e($article['title']) ?>" src="<?= e($article['image']) ?>"/>
</div>
<div class="p-stack-md">
<div class="flex justify-between items-center mb-stack-sm">
<span class="text-[12px] font-label-bold uppercase tracking-widest text-primary/70"><?= e($article['category']) ?></span>
<span class="text-[12px] text-on-surface-variant"><?= e(date('M j, Y', strtotime($article['date']))) ?></span>
</div>
<h3 class="font-headline-md text-on-surface mb-stack-sm line-clamp-2"><?= e($article['title']) ?></h3>
<p class="text-body-md text-on-surface-variant mb-stack-md line-clamp-2"><?= e($article['excerpt']) ?></p>
<span class="text-label-bold text-primary flex items-center gap-1">Read Full Story <span class="material-symbols-outlined text-[16px]">open_in_new</span></span>
</div>
</a>
<?php endforeach; ?>
</div>
</div>
</section>
<!-- Video Stories Section -->
<section class="bg-surface-container py-section-padding">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="flex flex-col md:flex-row justify-between items-end mb-stack-lg gap-4">
<div>
<h2 class="font-headline-lg text-primary mb-2">Voices from the Ground</h2>
<p class="font-body-lg text-on-surface-variant">Hear directly from the people whose lives are being changed through our programs.</p>
</div>
<div class="flex gap-2">
<a href="<?= url('/gallery') ?>" class="p-2 border border-primary text-primary rounded-full hover:bg-primary hover:text-on-primary transition-all inline-flex" aria-label="View gallery">
<span class="material-symbols-outlined">chevron_left</span>
</a>
<a href="<?= url('/gallery') ?>" class="p-2 border border-primary text-primary rounded-full hover:bg-primary hover:text-on-primary transition-all inline-flex" aria-label="View gallery">
<span class="material-symbols-outlined">chevron_right</span>
</a>
</div>
</div>
<div class="flex gap-gutter overflow-x-auto pb-stack-md snap-x no-scrollbar akfo-scroll-row">
<!-- Video Card 1 -->
<a href="<?= url('/news/rehabilitation-street-children-environment') ?>" class="min-w-[320px] md:min-w-[450px] snap-start block">
<div class="relative group cursor-pointer aspect-video rounded-xl overflow-hidden mb-stack-sm shadow-sm">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="How Water Transformed Our Village" src="https://lh3.googleusercontent.com/aida-public/AB6AXuANjZgOKZcnkRUlbIZAIHBhIXDlrjHdwjwNftv7hiBH7txgUyAZ64SYqfffonUOCpT5pmrL29ZAsMO-IprRoRP8HeB-ZGz-t2gBN5RlixiGvYtZkI2m4PJde3RpIKh_FiNmqqledE1G-2CWNvx6VLA-5pSKjFu6U4Dk5OoQFCejgIemmBXLnb9sgdZewFgBZkrVS9rEbOoDKXDfFW1R4UOwQN8Z_S5TOZE4o60kj3cfOydEX9cgaZ2q4w"/>
<div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/40 transition-all">
<div class="w-16 h-16 bg-white/90 rounded-full flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined !text-4xl" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
</div>
</div>
</div>
<h4 class="font-label-bold text-on-surface">"How Water Transformed Our Village"</h4>
<p class="text-body-md text-on-surface-variant">An interview with Chief Mwangi</p>
</a>
<!-- Video Card 2 -->
<a href="<?= url('/news/scholarships-youth-women-special-needs-2024') ?>" class="min-w-[320px] md:min-w-[450px] snap-start block">
<div class="relative group cursor-pointer aspect-video rounded-xl overflow-hidden mb-stack-sm shadow-sm">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Scholarship Recipient Spotlight" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAShKa6ZcJfCoSCCk7yw_MEN90ac96zmTKL9mPtavsE4jbklUGFuvaiybzg55SXgWeCzVFSgx23Gzzi1ZGCr4tp3dF2C16lBw-xXY33ysLMFHSm_hNbUU4TKwIOS94cUXYPWn0anPiyBj4ZtyLB5ZtxeRQSTrQCZspvpLlp3pqDQNVJLsrIKL8bYZdsrl6LenweNmMkMmJTO9goqkka3-2vTNNF2k2uTjOMmaouxa_2VgsOje8Ohs7tEw"/>
<div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/40 transition-all">
<div class="w-16 h-16 bg-white/90 rounded-full flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined !text-4xl" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
</div>
</div>
</div>
<h4 class="font-label-bold text-on-surface">Scholarship Recipient Spotlight: Amina's Journey</h4>
<p class="text-body-md text-on-surface-variant">Documentary Short, 4:20 min</p>
</a>
<!-- Video Card 3 -->
<a href="<?= url('/news/2025-youth-empowerment-strategy') ?>" class="min-w-[320px] md:min-w-[450px] snap-start block">
<div class="relative group cursor-pointer aspect-video rounded-xl overflow-hidden mb-stack-sm shadow-sm">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Agri-Tech project highlights" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAvWg2urh4d6VB0JICK7VsbZcRWALNGKfQXMwUvki9M1_Xqzo7uM_ZqQd7RSTJHhZiv8RQP9iHljthto_vK3HhMqvDGXKBiPDU5sAWESVRJlqEX3KDYl1HqbSPSZllxdUyqLTJgFBuozh4dRWwmKL5xH7oOsd3NHgeSI4qSuwO7dFPrL5YNSrZka4sNd-0VXLN8RPPYzMDqfK6MKvO8Od78eUXWx_XhsPT4YW6WXJ8_sqUR_i_n1enf2w"/>
<div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/40 transition-all">
<div class="w-16 h-16 bg-white/90 rounded-full flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined !text-4xl" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
</div>
</div>
</div>
<h4 class="font-label-bold text-on-surface">Agri-Tech: Sowing Seeds for Tomorrow</h4>
<p class="text-body-md text-on-surface-variant">Project Highlights 2024</p>
</a>
</div>
</div>
</section>
<!-- Media & Press Kit Section -->
<section class="py-section-padding bg-surface">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="bg-primary-container text-on-primary-container rounded-2xl overflow-hidden shadow-xl flex flex-col lg:flex-row">
<div class="p-stack-lg lg:w-2/3">
<h2 class="font-headline-lg mb-stack-sm">Media &amp; Press Relations</h2>
<p class="font-body-lg text-on-primary-container/80 mb-stack-lg">We welcome journalists and media partners to explore our official resources. Find everything you need to accurately tell the foundation's stories.</p>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-stack-md">
<a href="<?= url('/impact') ?>" class="flex items-center gap-4 bg-white/10 hover:bg-white/20 p-4 rounded-xl border border-white/10 transition-all">
<div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
<span class="material-symbols-outlined">description</span>
</div>
<div>
<h4 class="font-label-bold">2024 Media Kit</h4>
<p class="text-[12px] opacity-70">PDF (12.4 MB)</p>
</div>
</a>
<a href="<?= url('/about') ?>" class="flex items-center gap-4 bg-white/10 hover:bg-white/20 p-4 rounded-xl border border-white/10 transition-all">
<div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
<span class="material-symbols-outlined">image</span>
</div>
<div>
<h4 class="font-label-bold">Brand Assets</h4>
<p class="text-[12px] opacity-70">ZIP (45.2 MB)</p>
</div>
</a>
<a href="<?= url('/news') ?>" class="flex items-center gap-4 bg-white/10 hover:bg-white/20 p-4 rounded-xl border border-white/10 transition-all">
<div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
<span class="material-symbols-outlined">newspaper</span>
</div>
<div>
<h4 class="font-label-bold">Latest Releases</h4>
<p class="text-[12px] opacity-70">Archive (10 files)</p>
</div>
</a>
<a href="<?= url('/contact') ?>" class="flex items-center gap-4 bg-white/10 hover:bg-white/20 p-4 rounded-xl border border-white/10 transition-all">
<div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
<span class="material-symbols-outlined">mail</span>
</div>
<div>
<h4 class="font-label-bold">Media Inquiry</h4>
<p class="text-[12px] opacity-70">Contact our PR team</p>
</div>
</a>
</div>
</div>
<div class="lg:w-1/3 bg-primary p-stack-lg flex flex-col justify-center border-l border-white/10">
<h3 class="font-headline-md mb-stack-sm">Press Contact</h3>
<div class="space-y-stack-md opacity-80 font-body-md">
<p>For urgent press inquiries, please contact our Nairobi headquarters.</p>
<p class="flex items-center gap-2">
<span class="material-symbols-outlined text-[20px]">phone</span> <a href="tel:<?= e(preg_replace('/\s+/', '', $site['phone'])) ?>" class="hover:text-white transition-colors"><?= e($site['phone']) ?></a>
                            </p>
<p class="flex items-center gap-2">
<span class="material-symbols-outlined text-[20px]">email</span> <a href="mailto:<?= e($site['email']) ?>" class="hover:text-white transition-colors"><?= e($site['email']) ?></a>
                            </p>
<div class="flex gap-4 pt-stack-sm">
<?php $socialShare = $site['social'][0] ?? null; ?>
<?php if ($socialShare): ?>
<a href="<?= e($socialShare['url']) ?>" class="material-symbols-outlined hover:text-white transition-colors" aria-label="<?= e($socialShare['label']) ?>">share</a>
<?php endif; ?>
<a href="<?= url('/news') ?>" class="material-symbols-outlined hover:text-white transition-colors" aria-label="News feed">rss_feed</a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Newsletter CTA -->
<section class="py-section-padding">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="relative overflow-hidden rounded-2xl bg-surface-container-low p-stack-lg md:p-20 text-center">
<div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-secondary to-primary"></div>
<h2 class="font-display-lg text-primary mb-stack-sm">Stay Updated on Our Impact</h2>
<p class="font-body-lg text-on-surface-variant max-w-2xl mx-auto mb-stack-lg">Join our community of over 10,000 supporters and receive our monthly impact report, exclusive stories, and invitations to events.</p>
<form class="flex flex-col md:flex-row gap-4 max-w-xl mx-auto">
<input class="flex-grow bg-white border-outline-variant rounded-lg px-6 py-4 focus:ring-primary focus:border-primary transition-all text-body-md" placeholder="Your email address" required="" type="email"/>
<button class="bg-primary text-on-primary px-8 py-4 rounded-lg font-label-bold hover:bg-primary/90 shadow-md transition-all whitespace-nowrap" type="submit">Subscribe Now</button>
</form>
<p class="mt-4 text-[12px] text-on-surface-variant/60 italic">We respect your privacy. Unsubscribe at any time.</p>
</div>
</div>
</section>
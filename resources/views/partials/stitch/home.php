<?php
// Auto-extracted from Google Stitch design
?>
<!-- Hero Section -->
<section class="relative min-h-0 md:min-h-[921px] akfo-hero akfo-hero--tall flex items-center overflow-hidden">
<div class="absolute inset-0 z-0">
<div class="absolute inset-0 bg-gradient-to-r from-primary/90 via-primary/40 to-transparent z-10"></div>
<img class="w-full h-full object-cover" data-alt="A warm, vibrant photo of a diverse Kenyan community group in a sunny rural setting, smiling and engaging in a collaborative project. The lighting is golden and natural, emphasizing hope and community spirit. The photographic style is cinematic and high-resolution, captured with a shallow depth of field to highlight the authentic human connections within the Agnes Kagure Foundation's environment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrfeqnFP4XQazdLeoKM--B0KxMyI99fM2WvlZotzir3dEd_oGSq5zPQNqqA7YoGGYbHDJKx6QkCZO9ZyC2AGwDdp1gq79MuOZP33lSscyiPcxHS4cpJ2gKbx_eKdPxRLpoVMDGslwSO0b1dq_y923vNevWcMS-yV22zodQ2JNrjZX9tgTNRkTa3O-vJM1vQdB5fZt2x4tk29CMHkjsgyKYkV0pAAocCRPwMzc_vrduRPPD71h4R1Nt_Q"/>
</div>
<div class="relative z-20 max-w-container-max mx-auto px-margin-mobile md:px-gutter w-full py-16 md:py-24">
<div class="max-w-3xl">
<div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-white font-label-bold text-label-bold mb-8 animate-fade-in">
<span class="material-symbols-outlined text-[16px]">verified</span> 
                    Extending Opportunity &amp; Hope Across Nairobi
                </div>
<h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-white mb-6 leading-tight">
                    Turning Potentials <br/>
<span class="italic text-primary-fixed">into Possibilities!</span>
                </h1>
<p class="font-body-lg text-body-lg text-white/90 mb-10 max-w-xl leading-relaxed">
                    <?= e($site['description']) ?>
                </p>
<div class="flex flex-wrap gap-3 md:gap-4">
<a href="<?= url('/donate') ?>" class="bg-secondary-container text-on-secondary-container px-8 py-4 rounded-xl font-label-bold text-label-bold hover:shadow-[0_0_20px_rgba(254,214,91,0.4)] transition-all flex items-center gap-2 group btn-press">
                        Donate Now
                        <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">favorite</span>
</a>
<a href="<?= url('/get-involved#volunteer') ?>" class="bg-white/10 backdrop-blur-md border border-white/40 text-white px-8 py-4 rounded-xl font-label-bold text-label-bold hover:bg-white/20 transition-all btn-press">
                        Become a Volunteer
                    </a>
<a href="<?= url('/partners') ?>" class="text-white font-label-bold text-label-bold px-4 py-4 hover:underline underline-offset-8 transition-all flex items-center gap-2">
                        Partner With Us <span class="material-symbols-outlined">arrow_forward</span>
</a>
</div>
</div>
</div>
<!-- Floating Stats in Hero (Desktop) -->
<div class="hidden xl:flex absolute bottom-12 right-gutter gap-6 z-20">
<div class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl border border-white/20 text-white w-48">
<div class="font-stats-lg text-stats-lg text-primary-fixed mb-1">85</div>
<div class="font-label-bold text-label-bold opacity-80 uppercase tracking-widest">Nairobi Wards Engaged</div>
</div>
<div class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl border border-white/20 text-white w-48">
<div class="font-stats-lg text-stats-lg text-primary-fixed mb-1">4</div>
<div class="font-label-bold text-label-bold opacity-80 uppercase tracking-widest">Core Impact Pillars</div>
</div>
</div>
</section>
<!-- Mission Snapshot -->
<section class="py-section-padding bg-surface-container-lowest relative overflow-hidden">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter relative z-10">
<div class="text-center max-w-3xl mx-auto mb-20">
<h2 class="font-headline-lg text-headline-lg text-primary mb-4">Our Core Mission Pillars</h2>
<div class="h-1 w-24 bg-secondary-container mx-auto rounded-full mb-6"></div>
<p class="font-body-lg text-body-lg text-on-surface-variant">We stick to purpose — addressing livelihoods, education, gender equality, and health &amp; nutrition through community-led interventions across Nairobi.</p>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
<?php foreach ($site['pillars'] as $pillar): ?>
<div class="group p-8 rounded-2xl bg-white border border-surface-container-highest impact-card-hover transition-all duration-500">
<div class="w-14 h-14 rounded-xl bg-primary-fixed/30 flex items-center justify-center mb-6 group-hover:bg-primary-container group-hover:text-on-primary-container transition-colors duration-300">
<span class="material-symbols-outlined text-[32px] text-primary"><?= e($pillar['icon']) ?></span>
</div>
<h3 class="font-headline-md text-headline-md text-primary mb-3"><?= e($pillar['title']) ?></h3>
<p class="text-on-surface-variant mb-6"><?= e($pillar['description']) ?></p>
<a class="text-primary font-label-bold flex items-center gap-2 group-hover:gap-4 transition-all" href="<?= url('/programs#' . $pillar['id']) ?>">Learn More <span class="material-symbols-outlined">east</span></a>
</div>
<?php endforeach; ?>
</div>
</div>
</section>
<!-- Impact Stats Animated -->
<section class="py-24 bg-primary relative overflow-hidden">

<div class="relative z-10 max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-12 text-center akfo-stats-grid">
<div class="counter-container">
<div class="font-stats-lg text-stats-lg text-primary-fixed mb-2">85</div>
<div class="text-white font-label-bold uppercase tracking-widest opacity-80">Nairobi Wards</div>
</div>
<div class="counter-container">
<div class="font-stats-lg text-stats-lg text-primary-fixed mb-2">4</div>
<div class="text-white font-label-bold uppercase tracking-widest opacity-80">Core Pillars</div>
</div>
<div class="counter-container">
<div class="font-stats-lg text-stats-lg text-primary-fixed mb-2">2025</div>
<div class="text-white font-label-bold uppercase tracking-widest opacity-80">Youth Strategy</div>
</div>
<div class="counter-container">
<div class="font-stats-lg text-stats-lg text-primary-fixed mb-2">AKFO</div>
<div class="text-white font-label-bold uppercase tracking-widest opacity-80">Community-Led</div>
</div>
</div>
</div>
</section>
<!-- Featured Programs -->
<section class="py-section-padding">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
<div class="max-w-2xl">
<h2 class="font-headline-lg text-headline-lg text-primary mb-4">Transformative Programs</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant">Explore our flagship initiatives that are creating real change on the ground across the country.</p>
</div>
<a href="<?= url('/programs') ?>" class="text-primary font-label-bold flex items-center gap-2 group shrink-0">
                    View All Programs <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
<div class="relative group akfo-card-tall min-h-[280px] md:h-[500px] rounded-3xl overflow-hidden shadow-xl">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="A focused high school student in a blue Kenyan school uniform studying diligently in a well-lit classroom filled with books and maps. The photograph conveys a sense of ambition and the transformative power of education, with natural sunlight streaming through a window. The style is crisp, with warm tones and professional composition." src="https://lh3.googleusercontent.com/aida-public/AB6AXuARclKRIU-hevJGpAwTkB679NRyN4VXT84rG9Z08LQ_YudWy20eo80qoymrarJQy0Nx-toHn5wWd-nDi6ah0_SqXAxJLS5SRWSUhEqvsuRuMs5CX5W1SRuu6GoIkPbu1b2VaUWLV7AsDWRvSrYiDztZLfzSl9tChRxXkUyvIy3MI6JrCZk88HrW2l4tT18EqV5ciiqJJeaI9hYi8AROBN9LeCVsvJd4R4yvkpGAXZvUC0e9aklxUH7KgQ"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
<div class="absolute top-6 right-6 px-4 py-1.5 rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-white font-label-bold text-label-bold">
                        Education
                    </div>
<div class="absolute bottom-0 left-0 p-10 w-full">
<h3 class="font-headline-md text-headline-md text-white mb-3">Academic Excellence Support</h3>
<p class="text-white/80 font-body-md mb-6 max-w-md">Beyond tuition, we provide mentorship, learning materials, and psychosocial support to high-performing but vulnerable students.</p>
<a href="<?= url('/donate') ?>" class="inline-flex bg-primary-fixed text-on-primary-fixed px-6 py-2.5 rounded-lg font-label-bold text-label-bold hover:bg-white transition-all btn-press">Support This Program</a>
</div>
</div>
<div class="relative group akfo-card-tall min-h-[280px] md:h-[500px] rounded-3xl overflow-hidden shadow-xl">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="A group of Kenyan women entrepreneurs working together in a textile workshop, sewing colorful traditional fabrics. They are smiling, sharing ideas, and demonstrating professional craftsmanship. The setting is bright and industrious, symbolizing economic independence and collaborative empowerment. The lighting is soft and flattering, highlighting textures and colors." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQXLakbLaCqJlgeu1vY-BbchFzKMi03k42MNpW2hHnRa02RTIb9i3F28Lrw0M-B7KOXTRmucG8ccfNA6oWtGm2A3hTDRTYgshoOZf5q7tl3ALD_ivA1DpITw-SFhyr2It8WGc-LW-1cKxe-dpygg57JgW-sEgG7fokomgF_KuuBX3pFEroAXjJRMP3va4AmlX63sUB_CLF-ScvuRDaPF24djOt-vSr46Je7hf8KYB4u63ghbWtu3qfWA"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
<div class="absolute top-6 right-6 px-4 py-1.5 rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-white font-label-bold text-label-bold">
                        Entrepreneurship
                    </div>
<div class="absolute bottom-0 left-0 p-10 w-full">
<h3 class="font-headline-md text-headline-md text-white mb-3">Women Business Incubator</h3>
<p class="text-white/80 font-body-md mb-6 max-w-md">Equipping grassroots women with financial literacy, business management skills, and start-up capital for sustainable ventures.</p>
<a href="<?= url('/donate') ?>" class="inline-flex bg-primary-fixed text-on-primary-fixed px-6 py-2.5 rounded-lg font-label-bold text-label-bold hover:bg-white transition-all btn-press">Support This Program</a>
</div>
</div>
</div>
</div>
</section>
<!-- Success Stories -->
<section class="py-section-padding bg-surface-container-low overflow-hidden">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="text-center mb-16">
<span class="text-secondary font-label-bold uppercase tracking-widest">Voices of Impact</span>
<h2 class="font-headline-lg text-headline-lg text-primary mt-2">Success Stories</h2>
</div>
<div class="flex flex-col lg:flex-row gap-12 items-center">
<div class="w-full lg:w-1/2">
<div class="relative">
<div class="absolute -top-10 -left-10 w-32 h-32 bg-primary-fixed/20 rounded-full blur-3xl"></div>
<div class="absolute -bottom-10 -right-10 w-40 h-40 bg-secondary-container/20 rounded-full blur-3xl"></div>
<div class="relative bg-white p-6 sm:p-10 md:p-16 rounded-3xl md:rounded-[40px] shadow-2xl border border-surface-container-highest">
<span class="material-symbols-outlined text-[64px] text-primary/10 absolute top-8 right-12">format_quote</span>
<p class="font-headline-md text-headline-md text-on-surface italic leading-relaxed mb-10 relative z-10">
                                "The Foundation didn't just give me a scholarship; they gave me a community that believed in my dreams when I had nothing. Today, I am the first university graduate in my village."
                            </p>
<div class="flex items-center gap-4">
<div class="w-16 h-16 rounded-full bg-surface-container overflow-hidden">
<img class="w-full h-full object-cover" data-alt="A portrait of a young Kenyan man in his early 20s, wearing graduation attire, with a beaming, confident smile. The background is a soft-focus university campus during golden hour. He represents achievement, gratitude, and a bright future. High-end editorial portrait style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCD4NipCh9seYLYcQl2J02f6M63AXKhLul8YTIhlAq9Gtd8iIoh1EBSxGqhiLnpSmjDpOIgs4zxMGDlFZUygKaLYbKHejAIAjPaH7jF7OMS7KmlSvF3qp1u4_7dAEpPRxpqg8ugW2DcIDsL6jgMDAvNniLPVVmVse8RwoI2Rp1QEN9k-cChWsUMdqnUIzytI7hSXwgXZ27vnjRMoW3RC3QvLFmuCgY9DkAgzgPNAq2x3-qKKF3I85uvTA"/>
</div>
<div>
<h4 class="font-label-bold text-label-bold text-primary">Samuel Otieno</h4>
<p class="text-on-surface-variant text-sm">Scholarship Alumnus, Civil Engineer</p>
</div>
</div>
</div>
</div>
<div class="flex gap-4 mt-8 justify-center lg:justify-start">
<a href="<?= url('/news') ?>" class="w-12 h-12 rounded-full border border-primary text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-all duration-300" aria-label="Previous stories">
<span class="material-symbols-outlined">chevron_left</span>
</a>
<a href="<?= url('/news/gbv-campaign-nairobi-2024') ?>" class="w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center hover:bg-primary-container transition-all duration-300" aria-label="Latest story">
<span class="material-symbols-outlined">chevron_right</span>
</a>
</div>
</div>
<div class="w-full lg:w-1/2 grid grid-cols-2 gap-3 md:gap-4">
<div class="aspect-square rounded-2xl md:rounded-3xl overflow-hidden bg-surface-container">
<img class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" data-alt="Close-up of Kenyan community hands joined together in a circle, symbolizing unity and support. The focus is on the diverse textures of skin and fabric, conveying warmth and mutual strength. Soft, natural lighting on a warm afternoon." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD7TPPjmflsXTCgWzohzmCkbqOG3OLRKV0KlMTSDc8o2Mn_0bX84EdU4v26s8xlegSiDrui9FK5w_mIkXSmH3Fas0z8rFFpEWsoFw7pSyuVbRioVhNTfvJ2T6hkTls-nBwa3YHh0g92yQSh862BsvXN_Zgb4R6YFzf7IYo4MK8ZqNTXG3s5T76lR8jzo0XCtua40QcXxqVM6cQZaRqKTuLW2-d-C8ygGwAPO8QxKhv_3zbJR4qfmviPDw"/>
</div>
<div class="aspect-square rounded-2xl md:rounded-3xl overflow-hidden bg-surface-container mt-8 md:mt-12">
<img class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" data-alt="A vibrant open-air community meeting under a large acacia tree in rural Kenya. People are sitting in a circle, engaged in a peaceful and productive discussion. The atmosphere is respectful and inclusive. The scene is bright and colorful." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBM9x2TKge0CA73Ueb-Idq4FtU0d-vFTuD-mCTnT_DKJdJ-bh1iN-dWKMxB42ZoFuYHsHXsUN07gSdu_QYe5DAS7GOt9-IfZyNzK8qyuymicNLSjx2ELTLjLUiCjpJweM2giyymp0GDeu1VPCiq3ioRJFKjbsZycouOGVOkUfGLstEKJbeRRnN4KvEKgTxwZ6IBH43qXbG4IU-wd5eGbUfKS3GVFCuBfMutHJThu1iuv0eZK-xL_NlcrQ"/>
</div>
</div>
</div>
</div>
</section>
<!-- Latest News & Partners -->
<section class="py-section-padding bg-white">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="mb-16">
<h2 class="font-headline-lg text-headline-lg text-primary mb-4">Latest News &amp; Updates</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<?php foreach (array_slice(data('news'), 0, 3) as $article): ?>
<article class="group cursor-pointer">
<a href="<?= url('/news/' . $article['slug']) ?>" class="block">
<div class="aspect-video rounded-2xl overflow-hidden mb-6">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="<?= e($article['title']) ?>" src="<?= e($article['image']) ?>"/>
</div>
<div class="flex items-center gap-3 text-on-surface-variant text-sm mb-3">
<span><?= e(date('F j, Y', strtotime($article['date']))) ?></span>
<span class="w-1 h-1 rounded-full bg-outline-variant"></span>
<span><?= e($article['category']) ?></span>
</div>
<h3 class="font-headline-md text-[24px] leading-8 text-primary group-hover:text-secondary transition-colors mb-3"><?= e($article['title']) ?></h3>
<p class="text-on-surface-variant line-clamp-2"><?= e($article['excerpt']) ?></p>
</a>
</article>
<?php endforeach; ?>
</div>
</div>
<!-- Partners Slider -->
<div class="pt-20 border-t border-surface-container-highest text-center">
<p class="font-label-bold text-label-bold text-on-surface-variant uppercase tracking-[0.2em] mb-12">Our Strategic Partners &amp; Institutional Supporters</p>
<div class="flex flex-wrap justify-center items-center gap-12 md:gap-24 opacity-60 hover:opacity-100 transition-opacity duration-500">
<img alt="Partner 1" class="h-10 grayscale hover:grayscale-0 transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAC5yh8u0GCmtYI2PgWcpF6a8unRAJqphlfdO58ClwGdKyucSj8Z4viQSX1RIyNxS3rlkXAHJTbJCJCze2Te53-TKPrHfCHRt8h9ruOajdE7ZSLZAin-PThdSH_OqKlSS9Y8YrzYttHPYhHWDh-mES03xzHNBml558rv3AtquO2hyU9OuV4jDQs8nSQMP5LWZEyDKyvGJjTByuZb3nWe9deEMlMlqg2jn7NSRJ88_fKY-rcRiSLVksULw"/>
<img alt="Partner 2" class="h-10 grayscale hover:grayscale-0 transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdYDMr5O1qvL6LImi-6834R9QvdRzYICpHIWwYkKGvGtpZS5raYQZofr6wqbogxKgIXYDvaTNtlKHIfaRKzby5HlPHT0A3PpVh7QEadn40phrZU_Y40CQEyh1jsOdPutTJ35GhUfKMcEJE51WaVAAPMUv4RRg-CorQSvRQVv6PNLpAezIEDBttzq9ULBNp05uueeGMmAhdpsB3BtfF-_YvD2tM0hAULu-htJq7Tz3TNy_M8rQdDpgplA"/>
<img alt="Partner 3" class="h-10 grayscale hover:grayscale-0 transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC408jPHvMDtZBAfmMs1CJgS3eGiq87qQYjfOPg4Ugdh9691h94u2tXnLXRB_2YlfLVebY9C0gaFytO5ByQx5ufaSL5JeX44etqc9io5ILqlIXJpEYTT6pbV6CSVS9V7FRcDds2utbObwWc2qei9H8JSW7PY8Rzzh7VDCcsXeTuJevQnzqAeWS1g6ZJA1HCGakcVdsPCjS_WYEs0epaYHKw7DdKeoH0FMKV8pxzVrNcXJuvfnt8MEsy7g"/>
<img alt="Partner 4" class="h-10 grayscale hover:grayscale-0 transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAa6ekt2_vZ7DJw5SeuwDLruRiIeY-QoCZlJK1mRFsVsp7-Oq8nUu9gwjLRyOmFu3o17sCwbu-1fFSmGQaMVUQhbegHuP6efOXKDjTgCBq0JlByqAv1ywyN9Yw3FYPrHP-1gyOKum7sW3uMdSckwaPXogqm24ySrNlenroVlXzuI6jevoM0VCT-vBWZuWBkE--EIGK4N3SIJh-TWeITHlPv-F297zhbff93Lzp0R2S01k6I75qijtaSkA"/>
<img alt="Partner 5" class="h-10 grayscale hover:grayscale-0 transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-T3rSkR4-ywnY8Nm7saRV3M4iYCrSNvvPITO_dm6pVQyBaJ2ABjuTOFSRjHWiknMHePhwLfdjYv6k-5YEneEjMOIe7hoirTxtanv7oS4QTgnHdIDwXdGyfv-hZRHdW1B4JBsBcYb0QY9p06cPv-6hO_zaohRLOJX_DY77DIkcaOXWdzH0C7BjJ5Ro0umUvJjvZodDdw7_dxLlYq5HVyOsMULuVdAHJYcci4dsLtxVIzBldL_wJIsGCA"/>
</div>
</div>
</div>
</section>
<!-- Donation CTA Banner -->
<section class="max-w-container-max mx-auto px-margin-mobile md:px-gutter mb-20">
<div class="relative bg-primary-container rounded-[40px] p-8 md:p-12 lg:p-20 overflow-hidden text-center text-white akfo-cta-banner">

<div class="relative z-10 max-w-2xl mx-auto">
<h2 class="font-display-lg-mobile md:font-headline-lg text-white mb-6">Ready to make a difference?</h2>
<p class="font-body-lg text-body-lg text-white/80 mb-10">Your contribution, no matter the size, directly fuels our programs and brings hope to thousands of families across Kenya.</p>
<div class="flex flex-col sm:flex-row justify-center gap-6">
<a href="<?= url('/donate') ?>" class="inline-flex justify-center bg-secondary-container text-on-secondary-container px-10 py-5 rounded-2xl font-label-bold text-label-bold hover:scale-105 transition-all shadow-xl btn-press">Start Your Donation</a>
<a href="<?= url('/partners') ?>" class="inline-flex justify-center bg-white/10 backdrop-blur-md border border-white/30 text-white px-10 py-5 rounded-2xl font-label-bold text-label-bold hover:bg-white/20 transition-all">Contact Partnerships</a>
</div>
</div>
</div>
</section>
<?php
// Auto-extracted from Google Stitch design
?>
<!-- Hero Section -->
<section class="relative min-h-[480px] md:h-[819px] akfo-hero akfo-hero--tall flex items-center overflow-hidden">
<div class="absolute inset-0 z-0">
<div class="w-full h-full bg-cover bg-center" data-alt="A cinematic, wide-angle shot of a lush African landscape at golden hour, representing hope and renewal. The lighting is warm and ethereal, casting long shadows across rolling green hills. The composition is clean and modern, with a vast sky that suggests limitless possibility, aligning with the Agnes Kagure Foundation's vision of sustainable development and community empowerment." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB_hc3RdJUAQgb5i93Yrsw_xE8gRpu8j1gMvlc5plfggfYSkW7R2WQwOX836ep-cQsslfr2RNwyOzpSNMJM6VO8U7-OqjbB7XzXggwoulzNVNoDDAB9v0dyiIb4ZaZeBi_surkouzvtklu5AJBUL38moGrxi31_njFn1I-m_bAVvbA_dRGZmeAzEM-qK_LvBTiRVqdvAZqsLlcBmQSESoQ606PITpRzS3I_nlm6DADAl0VmCDRsW93ScA')"></div>
<div class="absolute inset-0 bg-gradient-to-r from-primary/80 to-transparent"></div>
</div>
<div class="relative z-10 max-w-container-max mx-auto px-margin-mobile md:px-gutter w-full">
<div class="max-w-2xl text-on-primary">
<h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg mb-6">Turning Potentials into Possibilities</h1>
<p class="font-body-lg text-body-lg opacity-90 mb-10">We extend opportunity and hope to people facing extreme poverty through community-led social and economic interventions across Nairobi.</p>
<div class="flex gap-4">
<a class="bg-secondary-container text-on-secondary-container px-8 py-4 rounded-lg font-label-bold hover:shadow-lg transition-all" href="#story">Explore Our Story</a>
<a class="border border-on-primary text-on-primary px-8 py-4 rounded-lg font-label-bold hover:bg-white/10 transition-all" href="<?= url('/impact') ?>">View Our Impact</a>
</div>
</div>
</div>
</section>
<!-- Our Story Section -->
<section class="py-section-padding bg-surface" id="story">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
<div class="relative">
<div class="rounded-xl overflow-hidden shadow-xl aspect-[4/5] relative">
<img class="w-full h-full object-cover" data-alt="A dignified and warm portrait of Agnes Kagure, the founder, engaging with a community of diverse local women in a vibrant outdoor setting. The lighting is natural and bright, emphasizing a sense of genuine human connection and grassroots leadership. The color palette is rich with natural greens and earthy tones, maintaining a professional yet approachable philanthropic aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9PmuiJLiy2K2l36F_Mt5Zn4pria0bvOXkrqDCgVCFM9n2Bxw7VnXE5-EB5Rbyvh74zJnmhTSGByW9cBhtfd8z4NrF--tsf7I80Hre_vt41U522W2PK8Ht0-4PlQjofaUOqM5vIgyLbOeKCaJIVqRhmNjcTpNrJL6BSYJA9uv_buW1cBW31e4A7zV1LFUvIbCoThnPRftBaoAdZ1J18gxxXLqP0MB5PSJHrJBfh2HtOB2_uyND3RI28w"/>
</div>
<div class="absolute -bottom-8 -right-8 bg-white p-8 rounded-xl shadow-2xl hidden lg:block max-w-[300px] akfo-float-card">
<div class="text-primary font-stats-lg text-stats-lg mb-2">AKFO</div>
<div class="font-label-bold text-on-surface-variant uppercase tracking-widest">Community-Led Impact</div>
</div>
</div>
<div class="space-y-6">
<span class="text-secondary font-label-bold tracking-[0.2em] uppercase">The Foundation</span>
<h2 class="font-headline-lg text-headline-lg text-primary">Rooted in Purpose</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                    Founded by <?= e($site['founder']['name']) ?>, the Agnes Kagure Foundation (AKFO) extends opportunity and hope to people facing extreme poverty. What began as a personal commitment to support needy students has grown into a multi-faceted foundation serving youth, women, and marginalized communities across Nairobi.
                </p>
<p class="font-body-md text-body-md text-on-surface-variant">
                    At AKFO, we accelerate the fight against extreme poverty through inspiring and nurturing the less fortunate. We believe in community participation to implement solutions that empower people — and we value every act of kindness, regardless of how simple it may seem.
                </p>
<div class="pt-4">
<blockquote class="border-l-4 border-secondary-container pl-6 italic font-headline-md text-on-surface-variant">
                        "<?= e($site['founder']['quote']) ?>"
                    </blockquote>
<p class="mt-3 font-label-bold text-on-surface-variant">— <?= e($site['founder']['name']) ?>, <?= e($site['founder']['title']) ?></p>
</div>
</div>
</div>
</section>
<!-- Vision, Mission, Values Bento Grid -->
<section class="py-section-padding bg-surface-container-low" id="north-star">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="text-center mb-16">
<h2 class="font-headline-lg text-headline-lg text-primary mb-4">Our North Star</h2>
<div class="w-24 h-1 bg-secondary-container mx-auto"></div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Vision -->
<div class="bg-white p-10 rounded-xl shadow-sm border border-outline-variant/30 flex flex-col items-center text-center group hover:border-primary transition-all duration-300">
<div class="w-16 h-16 rounded-full bg-primary-container/10 flex items-center justify-center mb-6 group-hover:bg-primary-container transition-colors">
<span class="material-symbols-outlined text-primary group-hover:text-white text-4xl">visibility</span>
</div>
<h3 class="font-headline-md text-headline-md mb-4 text-primary">Our Vision</h3>
<p class="text-on-surface-variant font-body-md"><?= e($site['vision']) ?></p>
</div>
<!-- Mission -->
<div class="bg-white p-10 rounded-xl shadow-sm border border-outline-variant/30 flex flex-col items-center text-center group hover:border-primary transition-all duration-300">
<div class="w-16 h-16 rounded-full bg-primary-container/10 flex items-center justify-center mb-6 group-hover:bg-primary-container transition-colors">
<span class="material-symbols-outlined text-primary group-hover:text-white text-4xl">flag</span>
</div>
<h3 class="font-headline-md text-headline-md mb-4 text-primary">Our Mission</h3>
<p class="text-on-surface-variant font-body-md"><?= e($site['mission']) ?></p>
</div>
<!-- Values -->
<div class="bg-white p-10 rounded-xl shadow-sm border border-outline-variant/30 flex flex-col items-center text-center group hover:border-primary transition-all duration-300">
<div class="w-16 h-16 rounded-full bg-primary-container/10 flex items-center justify-center mb-6 group-hover:bg-primary-container transition-colors">
<span class="material-symbols-outlined text-primary group-hover:text-white text-4xl">diversity_1</span>
</div>
<h3 class="font-headline-md text-headline-md mb-4 text-primary">Core Values</h3>
<ul class="text-on-surface-variant font-body-md space-y-2">
<li>Community Participation</li>
<li>Persistence &amp; Purpose</li>
<li>Inclusive Empowerment</li>
<li>Sustainable Interventions</li>
</ul>
</div>
</div>
</div>
</section>
<!-- Leadership Section -->
<section class="py-section-padding bg-surface">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="flex justify-between items-end mb-16">
<div>
<span class="text-secondary font-label-bold tracking-[0.2em] uppercase">Our Founder</span>
<h2 class="font-headline-lg text-headline-lg text-primary">Guided by Agnes Kagure</h2>
</div>
<div class="hidden md:block">
<p class="max-w-md text-on-surface-variant">Businesswoman, philanthropist, and AKFO Patron — leading community empowerment programmes across Nairobi County.</p>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
<!-- Founder -->
<div class="group lg:col-span-2">
<div class="relative overflow-hidden rounded-xl aspect-[3/4] mb-4">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A dignified and warm portrait of Agnes Kagure, founder of the Agnes Kagure Foundation, engaging with community members in Nairobi." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9PmuiJLiy2K2l36F_Mt5Zn4pria0bvOXkrqDCgVCFM9n2Bxw7VnXE5-EB5Rbyvh74zJnmhTSGByW9cBhtfd8z4NrF--tsf7I80Hre_vt41U522W2PK8Ht0-4PlQjofaUOqM5vIgyLbOeKCaJIVqRhmNjcTpNrJL6BSYJA9uv_buW1cBW31e4A7zV1LFUvIbCoThnPRftBaoAdZ1J18gxxXLqP0MB5PSJHrJBfh2HtOB2_uyND3RI28w"/>
</div>
<h4 class="font-headline-md text-xl text-primary font-bold"><?= e($site['founder']['name']) ?></h4>
<p class="text-on-surface-variant font-label-bold"><?= e($site['founder']['title']) ?></p>
<p class="text-on-surface-variant font-body-md mt-3"><?= e($site['founder']['principle']) ?> Through AKFO, she champions scholarships, GBV prevention, widows' welfare, elderly care, and youth innovation hubs across Nairobi.</p>
</div>
<!-- Placeholder team cards removed — AKFO is founder-led with community partners -->
<div class="group hidden lg:block">
<div class="relative overflow-hidden rounded-xl aspect-[3/4] mb-4 bg-primary-fixed/20 flex items-center justify-center p-8">
<div class="text-center">
<span class="material-symbols-outlined text-primary text-5xl mb-4">handshake</span>
<p class="font-body-md text-on-surface-variant">Partnering with Community Health Promoters, CBOs, and local leaders across Nairobi's 85 wards.</p>
</div>
</div>
<h4 class="font-headline-md text-xl text-primary font-bold">Community Partners</h4>
<p class="text-on-surface-variant font-label-bold">Grassroots Network</p>
</div>
<div class="group hidden lg:block">
<div class="relative overflow-hidden rounded-xl aspect-[3/4] mb-4 bg-secondary-fixed/20 flex items-center justify-center p-8">
<div class="text-center">
<span class="material-symbols-outlined text-secondary text-5xl mb-4">volunteer_activism</span>
<p class="font-body-md text-on-surface-variant">Volunteers and supporters working alongside AKFO teams on education, welfare, and environmental programmes.</p>
</div>
</div>
<h4 class="font-headline-md text-xl text-primary font-bold">Volunteers &amp; Supporters</h4>
<p class="text-on-surface-variant font-label-bold">Join the Movement</p>
</div>
</div>
</div>
</section>
<!-- Interactive Journey Timeline -->
<section class="py-section-padding bg-surface-container-highest/20 overflow-hidden">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="text-center mb-20">
<h2 class="font-headline-lg text-headline-lg text-primary">Our Journey Timeline</h2>
<p class="text-on-surface-variant mt-4">Key milestones in AKFO's community empowerment journey across Nairobi.</p>
</div>
<div class="relative">
<!-- Timeline Desktop Line -->
<div class="absolute top-1/2 left-0 w-full h-1 timeline-line hidden lg:block -translate-y-1/2"></div>
<!-- Timeline Items -->
<div class="grid grid-cols-1 lg:grid-cols-4 gap-12 relative z-10">
<!-- Year 1 -->
<div class="relative group">
<div class="hidden lg:block absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-secondary-container border-4 border-white shadow-md z-20 group-hover:scale-150 transition-transform"></div>
<div class="bg-white p-8 rounded-xl shadow-lg lg:mb-12 group-hover:-translate-y-2 transition-transform">
<div class="text-secondary font-stats-lg text-3xl mb-2">2024</div>
<h5 class="font-bold text-primary mb-3">Youth &amp; Special Needs Projects</h5>
<p class="text-sm text-on-surface-variant">Roll-out of projects uplifting youth, women, and persons with special needs — including academic scholarships from secondary to tertiary level.</p>
</div>
</div>
<!-- Year 2 -->
<div class="relative group">
<div class="hidden lg:block absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-secondary-container border-4 border-white shadow-md z-20 group-hover:scale-150 transition-transform"></div>
<div class="bg-white p-8 rounded-xl shadow-lg lg:mt-32 group-hover:-translate-y-2 transition-transform">
<div class="text-secondary font-stats-lg text-3xl mb-2">2024</div>
<h5 class="font-bold text-primary mb-3">GBV Campaign Launch</h5>
<p class="text-sm text-on-surface-variant">Gender-inclusive campaign across Nairobi's 85 wards, partnering with Community Health Promoters for survivor support.</p>
</div>
</div>
<!-- Year 3 -->
<div class="relative group">
<div class="hidden lg:block absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-secondary-container border-4 border-white shadow-md z-20 group-hover:scale-150 transition-transform"></div>
<div class="bg-white p-8 rounded-xl shadow-lg lg:mb-12 group-hover:-translate-y-2 transition-transform">
<div class="text-secondary font-stats-lg text-3xl mb-2">2024</div>
<h5 class="font-bold text-primary mb-3">Rehabilitation &amp; Environment</h5>
<p class="text-sm text-on-surface-variant">Street children rehabilitation pathways and tree-planting at John Michuki Memorial Park.</p>
</div>
</div>
<!-- Year 4 -->
<div class="relative group">
<div class="hidden lg:block absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-secondary-container border-4 border-white shadow-md z-20 group-hover:scale-150 transition-transform"></div>
<div class="bg-white p-8 rounded-xl shadow-lg lg:mt-32 group-hover:-translate-y-2 transition-transform">
<div class="text-secondary font-stats-lg text-3xl mb-2">2025</div>
<h5 class="font-bold text-primary mb-3">Youth Innovation Strategy</h5>
<p class="text-sm text-on-surface-variant">Launch of innovation hubs, entrepreneurship platforms, and mentorship for boys and girls across Nairobi.</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Governance & Transparency -->
<section class="py-section-padding bg-primary text-on-primary" id="governance">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter grid grid-cols-1 lg:grid-cols-2 gap-gutter items-center">
<div>
<h2 class="font-headline-lg text-headline-lg mb-6">Built on Transparency</h2>
<p class="font-body-lg mb-8 opacity-90">Governance is the cornerstone of our sustainability. We hold ourselves to the highest global standards of accountability to ensure that every cent donated reaches the communities intended.</p>
<div class="space-y-6">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-secondary-container text-3xl">verified_user</span>
<div>
<h4 class="font-bold text-xl mb-1">Audited Financials</h4>
<p class="text-sm opacity-75">All financial statements are independently audited by international firms annually.</p>
</div>
</div>
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-secondary-container text-3xl">policy</span>
<div>
<h4 class="font-bold text-xl mb-1">Ethical Framework</h4>
<p class="text-sm opacity-75">Rigorous anti-corruption and safeguarding policies across all program levels.</p>
</div>
</div>
</div>
</div>
<div class="bg-white/10 backdrop-blur-md rounded-xl p-8 border border-white/20">
<h3 class="font-headline-md text-2xl mb-6">Annual Reports</h3>
<div class="space-y-4">
<a class="flex justify-between items-center p-4 bg-white/5 hover:bg-white/20 rounded-lg transition-colors group" href="<?= url('/impact') ?>">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary-container">description</span>
<span class="font-medium">Impact Report 2023</span>
</div>
<span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">download</span>
</a>
<a class="flex justify-between items-center p-4 bg-white/5 hover:bg-white/20 rounded-lg transition-colors group" href="<?= url('/impact') ?>">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary-container">description</span>
<span class="font-medium">Financial Statement 2023</span>
</div>
<span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">download</span>
</a>
<a class="flex justify-between items-center p-4 bg-white/5 hover:bg-white/20 rounded-lg transition-colors group" href="<?= url('/impact') ?>">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary-container">description</span>
<span class="font-medium">Governance Charter</span>
</div>
<span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">download</span>
</a>
</div>
</div>
</div>
</section>
<!-- Impact Philosophy & Photo Gallery -->
<section class="py-section-padding bg-surface">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="text-center mb-16">
<h2 class="font-headline-lg text-headline-lg text-primary mb-4">Our Impact in Action</h2>
<p class="text-on-surface-variant max-w-2xl mx-auto">Philosophy: We believe in 'Development through Dignity'. Every photo here represents a life touched, a business started, or a child returned to school.</p>
</div>
<!-- Bento Gallery -->
<div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 h-auto md:h-[600px] akfo-bento-grid">
<div class="md:col-span-2 md:row-span-2 relative overflow-hidden rounded-xl group">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="A wide shot of a community gathering under a large acacia tree, where local leaders are discussing water management projects. The scene is filled with vibrant colors of traditional fabrics and the golden light of the afternoon. High-resolution photo highlighting community engagement and collaboration, with a professional documentary style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCppgtPVfmIdWC1fvppFc6T1oT7TGj6_Tt1F9hrmZAbT9xNQ3xuBPsQWcn4C4MkYXDVwfnvMVcfxCxF9x-fnqD5aqSX9RxF6kEu7n9tE5SjMFyNmCtnzYHKE_GZkK42jebGYmk-KVptDfBZvI0IgVvDDwMRFb5gUGMtOqWtJhOSUGC6GBYWYvRDIHS9bF13hxgxcoXMKR6GJuK2loYicmkhfDUDJBOJWhuwK_WlpiVSVyelCK2TUMF3YQ"/>
<div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity p-6 flex flex-col justify-end">
<h5 class="text-white font-bold text-xl">Community Dialogue</h5>
<p class="text-white/80 text-sm">Empowering local voices in decision making.</p>
</div>
</div>
<div class="md:col-span-2 relative overflow-hidden rounded-xl group">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="Close-up of a young student in a clean school uniform, smiling as they look at a modern tablet in a bright, newly built classroom. The background shows other students engaged in learning. The photo exudes optimism and the power of digital education in rural areas. Clean, sharp photography with bright primary colors." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBazzSsNtiKLfbeVHvzZF6jZXWz0MvJUyc7sNguYxaMnT8YFif4tlPTc2iGcFnJ9OKhInSr-lvB4mNL2h7wjQ6ejHcwAXVK92S3zQDicTf4OtlOBbmZ7BzXzOMiqRktAFhUHIc-BVXQ7j_sBYbqa-a0DdHjUscck67gOg5-aoXm1zxtVtqiCAhBinSmR9bkIh8BlJN3bIbliUdEeq4t4o9S96Y6oP1_Csg6R_pX7jx-EBn2iTb_S0JDKg"/>
<div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity p-6 flex flex-col justify-end">
<h5 class="text-white font-bold text-xl">Digital Literacy</h5>
<p class="text-white/80 text-sm">Bridging the gap for future generations.</p>
</div>
</div>
<div class="relative overflow-hidden rounded-xl group">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="A focused shot of a woman's hands skillfully weaving a traditional basket in a vibrant market stall. The detail of the craftsmanship is sharp, with warm, earthy tones. The image represents economic empowerment and the preservation of culture. Artistic, intimate lighting that emphasizes texture and skill." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAWFXxTSmsfslKdXv2ix-f4chEKF12UDl9VnzPMmpKL9fr275o3bb-1GH7-GIAsgKoNAm7DwoCkUkPth6rZNFZfMhtVgMV9bwaeairyQKRWr7J1jFwi0Ktmk_8OuyL_0gKg22pqoChVwXd3ZrCAY2gX7_AuixkfQJCwXbPkj_G0TrozfdtzmhQoMdyRZzxdPfjl2Lx-WIWBFvQhiAMAmIby_yMzBAmIaNavjs_Gz6ipu2Cj_CzhILyS-w"/>
<div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity p-6 flex flex-col justify-end">
<h5 class="text-white font-bold text-lg">Economic Agency</h5>
</div>
</div>
<div class="relative overflow-hidden rounded-xl group">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" data-alt="A healthcare professional in a green clinic uniform providing a check-up to a small child while the mother looks on with a smile. The environment is clean, bright, and modern. This image captures the essence of compassionate healthcare and community trust. High-key lighting, professional and reassuring aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-7BFRiorDF0gNy4xQ-ovThjXG5FKSdrKOQs2ppCDQWOdxeteUwgz3uiAGh8YZo0CIwXbLsoifO3j7b1_8wWhxXXx_IdQg4YpwfVfo9JEpPoPFE_zkwH2FQ-9AX2S2o9IFOTMdNkUUgZDMHQuRfmXKhLD_9QyJBtTzHpEuTzmYd059VUBDMyOE7RTlA14-PYiehEgudHe9qZzHnYVGdOmbgkUs25vD24QtDwwLz4juuhXx3pfAZsoNSQ"/>
<div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity p-6 flex flex-col justify-end">
<h5 class="text-white font-bold text-lg">Health Advocacy</h5>
</div>
</div>
</div>
</div>
</section>
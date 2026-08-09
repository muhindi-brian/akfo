<?php
// Auto-extracted from Google Stitch design
?>
<!-- Hero Section -->
<section class="relative min-h-[60vh] md:min-h-[70vh] akfo-hero flex items-center pt-20 overflow-hidden">
<div class="absolute inset-0 z-0">
<div class="w-full h-full bg-cover bg-center" data-alt="A wide-angle, cinematic photograph of diverse community leaders and foundation representatives shaking hands in a sunlit, modern community center in Kenya. The lighting is warm and natural, emphasizing collaboration, trust, and empowerment. High quality, documentary style, deep green accents visible in the background." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBYlGwufjIR4-yad9aTNxIVAsrdFThuQ4PkSYgAeKBz-dioj_Lks9dC2omIbVSesFqa-RB7ro0aTHDKHqYr-OjHkYZB0xbox6LUQS5jSljd0JSUfjxoo4abPLssYEgv873acTS1wsU4757q7XGhVxXK--dWLCQQtAKzXXF6vSx_O5rXrevybjgjsnQtTNgNe4nUxvjPxXxCcwdqcBS2ipEGNLhZZ28zhver3Gw62NeKgSw9KgKC8uK3Vw')"></div>
<div class="absolute inset-0 bg-gradient-to-r from-primary/90 to-primary/40"></div>
</div>
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter relative z-10 w-full py-section-padding">
<div class="max-w-3xl glass-panel p-8 md:p-12 rounded-2xl soft-shadow animate-fade-in-up">
<span class="inline-block px-4 py-1.5 rounded-full bg-primary-container/20 text-primary font-label-bold text-label-bold mb-6">Our Partnerships</span>
<h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-background mb-6">Stronger Together:<br>Our Partners &amp; Alliances</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-8 max-w-2xl">
                        Sustainable development is a collaborative journey. By forging strategic alliances with global NGOs, corporate leaders, and government institutions, we multiply our impact and drive systemic change across communities.
                    </p>
<div class="flex flex-wrap gap-4">
<a href="#partner-form" class="inline-flex bg-primary text-on-primary font-label-bold text-label-bold px-8 py-4 rounded-xl hover:bg-surface-tint transition-colors shadow-lg">
                            Become a Partner
                        </a>
<a href="#success-stories" class="inline-flex bg-transparent border border-outline text-primary font-label-bold text-label-bold px-8 py-4 rounded-xl hover:bg-surface-container-low transition-colors">
                            Explore Network
                        </a>
</div>
</div>
</div>
</section>
<section class="py-section-padding bg-surface-container-low" id="partner-form">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <h2 class="font-headline-md text-headline-md text-on-background mb-4">Become a Strategic Partner</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant">Let's collaborate to drive systemic change across Kenya. Fill out the form below and our partnership team will be in touch.</p>
        </div>
        <div class="max-w-2xl mx-auto bg-surface-container-lowest p-8 md:p-12 rounded-2xl soft-shadow">
            <form class="grid grid-cols-1 gap-6" action="<?= url('/partners') ?>" method="POST" novalidate>
            <?= csrf_field() ?>
                <div class="flex flex-col gap-2">
                    <label class="font-label-bold text-label-bold text-on-surface-variant">Organization Name</label>
                    <input type="text" placeholder="Enter your organization name" class="w-full px-4 py-3 rounded-xl border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="font-label-bold text-label-bold text-on-surface-variant">Contact Person</label>
                        <input type="text" placeholder="Full name" class="w-full px-4 py-3 rounded-xl border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-label-bold text-label-bold text-on-surface-variant">Email Address</label>
                        <input type="email" placeholder="email@organization.org" class="w-full px-4 py-3 rounded-xl border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none">
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-label-bold text-label-bold text-on-surface-variant">Partnership Type</label>
                    <select class="w-full px-4 py-3 rounded-xl border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none appearance-none">
                        <option value="">Select a type</option>
                        <option value="strategic">Strategic Alliance</option>
                        <option value="csr">Corporate Social Responsibility</option>
                        <option value="ngo">NGO Collaboration</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-label-bold text-label-bold text-on-surface-variant">Message / Proposal</label>
                    <textarea rows="4" placeholder="Tell us about your vision for collaboration..." class="w-full px-4 py-3 rounded-xl border border-outline-variant bg-surface focus:border-primary focus:ring-1 focus:ring-primary transition-all outline-none resize-none"></textarea>
                </div>
                <button type="submit" class="w-full bg-primary text-on-primary font-label-bold text-label-bold py-4 rounded-xl hover:bg-surface-tint transition-colors shadow-lg mt-4">
                    Submit Inquiry
                </button>
            </form>
        </div>
    </div>
</section><section class="py-section-padding bg-background" id="success-stories">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <h2 class="font-headline-md text-headline-md text-on-background mb-4">Collaborative Success Stories</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant">Discover how our strategic alliances are driving measurable change across Kenya's most vulnerable communities.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-surface-container-lowest p-8 rounded-2xl soft-shadow hover-lift">
                <span class="inline-block px-3 py-1 rounded-full bg-primary-container/10 text-primary font-label-bold text-sm mb-4">Education Alliance</span>
                <h3 class="font-headline-md text-2xl text-on-background mb-4">20,000+ Students Empowered with Solar Learning</h3>
                <p class="font-body-md text-on-surface-variant mb-6">In partnership with global tech leaders, we've deployed solar-powered digital labs to remote schools.</p>
                <div class="text-primary font-bold text-headline-md">85%</div>
                <div class="text-sm text-on-surface-variant font-label-bold">Improvement in Literacy Rates</div>
            </div>
            <!-- Card 2 -->
            <div class="bg-surface-container-lowest p-8 rounded-2xl soft-shadow hover-lift">
                <span class="inline-block px-3 py-1 rounded-full bg-primary-container/10 text-primary font-label-bold text-sm mb-4">Health Initiative</span>
                <h3 class="font-headline-md text-2xl text-on-background mb-4">Transforming Maternal Healthcare in Kitui</h3>
                <p class="font-body-md text-on-surface-variant mb-6">Collaborating with regional health ministries to provide mobile clinics and prenatal care kits.</p>
                <div class="text-primary font-bold text-headline-md">12,000+</div>
                <div class="text-sm text-on-surface-variant font-label-bold">Safe Deliveries Supported</div>
            </div>
            <!-- Card 3 -->
            <div class="bg-surface-container-lowest p-8 rounded-2xl soft-shadow hover-lift">
                <span class="inline-block px-3 py-1 rounded-full bg-primary-container/10 text-primary font-label-bold text-sm mb-4">Economic Empowerment</span>
                <h3 class="font-headline-md text-2xl text-on-background mb-4">Empowering 5,000 Women Entrepreneurs</h3>
                <p class="font-body-md text-on-surface-variant mb-6">Strategic micro-finance partnerships providing seed capital and business mentorship.</p>
                <div class="text-primary font-bold text-headline-md">$2.4M</div>
                <div class="text-sm text-on-surface-variant font-label-bold">New Local Revenue Generated</div>
            </div>
        </div>
    </div>
</section>
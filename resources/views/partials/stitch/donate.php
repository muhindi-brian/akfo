<?php
// Auto-extracted from Google Stitch design
?>
<!-- Hero Section -->
<section class="relative w-full min-h-[400px] md:h-[600px] akfo-hero flex items-center justify-center overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center" data-alt="A deeply emotional and inspiring photograph of a vibrant Kenyan community gathering outdoors. The scene is bathed in golden hour sunlight, highlighting the genuine smiles and hopeful expressions of children and adults. The composition focuses on authentic human connection, utilizing a soft focus background to emphasize the foreground subjects. The overall color palette is warm, earthy, and optimistic, aligning perfectly with a modern philanthropic aesthetic." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuChvYf-ENC8c9WcsKziDJW69BJo5nhnr9zyKQedEUZx72OPfSwR-zyqsQPk9BvzUWWBCwf2fJiu5oemQn8jje8rCtvzUoya6mSXgc6A6_ncKegdnpG43mnL94rLMzD0bW0r9rKVsznX3gXgiZw63WtFz3F_K_pxUCvaUiW6k3wJw3IaD3DYFiaImnDdgmU1E6Kj1RLwQEu2c6GbP7_1NFIU3qF2Q9Sr1ckgzBcKEfkdd4iFZm5ctBCu1g')"></div>
<div class="absolute inset-0 bg-primary/40 mix-blend-multiply"></div>
<div class="relative z-10 text-center px-margin-mobile md:px-gutter max-w-3xl mx-auto glass-panel p-stack-lg rounded-xl soft-shadow mt-12">
<h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-primary mb-6">Your Generosity, Their Future</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-8 max-w-2xl mx-auto">Every contribution creates tangible change. Join us in building sustainable communities with radical transparency and lasting impact.</p>
<div class="flex items-center justify-center gap-2 text-primary font-label-bold text-label-bold">
<span class="material-symbols-outlined icon-fill">verified_user</span>
                    100% Secure &amp; Transparent Giving
                </div>
</div>
</section>
<!-- Donation Widget Section -->
<section class="py-section-padding px-margin-mobile md:px-gutter max-w-container-max mx-auto -mt-32 relative z-20">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Main Form -->
<div class="lg:col-span-7 bg-surface rounded-xl p-stack-lg soft-shadow">
<h2 class="font-headline-lg text-headline-lg text-primary mb-8 border-b-2 border-surface-variant pb-4">Make a Difference Today</h2>
<form class="space-y-stack-md" action="<?= url('/donate') ?>" method="POST" novalidate>
<?= csrf_field() ?>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
<div>
<label class="block font-label-bold text-label-bold text-on-surface mb-2" for="donor-name">Full Name</label>
<input class="w-full bg-surface-container-low border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary" id="donor-name" name="name" value="<?= e(old('name')) ?>" type="text" required/>
</div>
<div>
<label class="block font-label-bold text-label-bold text-on-surface mb-2" for="donor-email">Email Address</label>
<input class="w-full bg-surface-container-low border-none rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary" id="donor-email" name="email" value="<?= e(old('email')) ?>" type="email" required/>
</div>
</div>
<!-- Frequency -->
<div>
<label class="block font-label-bold text-label-bold text-on-surface mb-4">Choose Frequency</label>
<div class="grid grid-cols-2 gap-4">
<label class="cursor-pointer">
<input checked="" class="peer sr-only" name="frequency" type="radio" value="once"/>
<div class="text-center py-4 rounded-lg border-2 border-surface-variant peer-checked:border-primary peer-checked:bg-primary-container/10 transition-all">
<span class="font-label-bold text-label-bold text-primary">One-Time</span>
</div>
</label>
<label class="cursor-pointer">
<input class="peer sr-only" name="frequency" type="radio" value="monthly"/>
<div class="text-center py-4 rounded-lg border-2 border-surface-variant peer-checked:border-primary peer-checked:bg-primary-container/10 transition-all flex flex-col items-center justify-center">
<span class="font-label-bold text-label-bold text-primary">Monthly</span>
<span class="text-xs text-secondary mt-1">Highest Impact</span>
</div>
</label>
</div>
</div>
<!-- Amounts -->
<div>
<label class="block font-label-bold text-label-bold text-on-surface mb-4">Select Amount</label>
<div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-4">
<label class="cursor-pointer group">
<input class="peer sr-only" name="amount" type="radio" value="1000"/>
<div class="text-center py-4 rounded-lg border border-surface-variant peer-checked:border-primary peer-checked:bg-primary peer-checked:text-on-primary transition-all soft-shadow-hover bg-surface">
<div class="font-label-bold text-label-bold mb-1 group-hover:text-primary peer-checked:group-hover:text-on-primary">KES 1,000</div>
<div class="text-xs text-on-surface-variant peer-checked:text-on-primary/80">Provides school supplies</div>
</div>
</label>
<label class="cursor-pointer group">
<input checked="" class="peer sr-only" name="amount" type="radio" value="5000"/>
<div class="text-center py-4 rounded-lg border border-surface-variant peer-checked:border-primary peer-checked:bg-primary peer-checked:text-on-primary transition-all soft-shadow-hover bg-surface">
<div class="font-label-bold text-label-bold mb-1 group-hover:text-primary peer-checked:group-hover:text-on-primary">KES 5,000</div>
<div class="text-xs text-on-surface-variant peer-checked:text-on-primary/80">Funds medical outreach</div>
</div>
</label>
<label class="cursor-pointer group">
<input class="peer sr-only" name="amount" type="radio" value="10000"/>
<div class="text-center py-4 rounded-lg border border-surface-variant peer-checked:border-primary peer-checked:bg-primary peer-checked:text-on-primary transition-all soft-shadow-hover bg-surface">
<div class="font-label-bold text-label-bold mb-1 group-hover:text-primary peer-checked:group-hover:text-on-primary">KES 10,000</div>
<div class="text-xs text-on-surface-variant peer-checked:text-on-primary/80">Clean water for a family</div>
</div>
</label>
</div>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 font-label-bold text-on-surface-variant">KES</span>
<input class="w-full bg-surface-container-low border-none rounded-lg pl-14 pr-4 py-4 focus:ring-2 focus:ring-primary focus:border-transparent transition-all" name="amount" placeholder="Other Amount" type="number" min="1"/>
</div>
</div>
<!-- Project Allocation -->
<div>
<label class="block font-label-bold text-label-bold text-on-surface mb-4">Direct My Donation To</label>
<select class="w-full bg-surface-container-low border-none rounded-lg px-4 py-4 focus:ring-2 focus:ring-primary focus:border-transparent transition-all appearance-none cursor-pointer" name="program">
<option value="general">Area of Greatest Need (General Fund)</option>
<option value="education">Education Initiatives</option>
<option value="healthcare">Healthcare &amp; Outreach</option>
<option value="water">Clean Water Projects</option>
</select>
</div>
<!-- CTA -->
<div class="pt-6">
<button class="w-full bg-secondary text-on-secondary-fixed-variant font-label-bold text-label-bold py-4 rounded-lg hover:bg-secondary-container transition-colors flex justify-center items-center gap-2" type="submit">
<span class="material-symbols-outlined">favorite</span>
                                Donate Securely
                            </button>
<p class="text-center text-xs text-on-surface-variant mt-4">By donating, you agree to our Terms of Service and Privacy Policy.</p>
</div>
</form>
</div>
<!-- Trust Sidebar -->
<div class="lg:col-span-5 space-y-gutter">
<!-- Impact Card -->
<div class="bg-primary-container text-on-primary-container rounded-xl p-stack-md soft-shadow relative overflow-hidden">
<div class="absolute -right-12 -top-12 opacity-10">
<span class="material-symbols-outlined" style="font-size: 160px;">public</span>
</div>
<h3 class="font-headline-md text-headline-md mb-4 relative z-10">Your Impact Matters</h3>
<p class="font-body-md text-body-md mb-6 relative z-10 opacity-90">In 2023, donor support enabled us to reach over 50,000 individuals across rural communities.</p>
<div class="space-y-4 relative z-10">
<div class="bg-surface/10 rounded-lg p-4 backdrop-blur-sm">
<div class="flex justify-between items-center mb-2">
<span class="font-label-bold">Current Campaign Goal</span>
<span class="font-label-bold">75%</span>
</div>
<div class="w-full bg-surface/20 rounded-full h-2">
<div class="bg-tertiary-fixed h-2 rounded-full" style="width: 75%"></div>
</div>
</div>
</div>
</div>
<!-- Trust Signals -->
<div class="bg-surface rounded-xl p-stack-md soft-shadow">
<h4 class="font-label-bold text-label-bold text-on-surface mb-4 uppercase tracking-wider">Secure &amp; Trusted</h4>
<div class="flex items-center gap-4 text-on-surface-variant mb-6">
<span class="material-symbols-outlined text-primary text-3xl">lock</span>
<span class="text-sm">256-bit SSL encryption. We do not store your payment data.</span>
</div>
<div class="flex flex-wrap gap-4 items-center justify-start opacity-70 grayscale hover:grayscale-0 transition-all duration-300">
<!-- Placeholder for payment logos -->
<div class="px-3 py-1 border border-surface-variant rounded text-xs font-bold">VISA</div>
<div class="px-3 py-1 border border-surface-variant rounded text-xs font-bold">Mastercard</div>
<div class="px-3 py-1 border border-surface-variant rounded text-xs font-bold text-green-600 border-green-600 bg-green-50">M-PESA</div>
</div>
</div>
<!-- Tax Info -->
<div class="bg-surface-container-low rounded-xl p-stack-md flex gap-4 items-start border-l-4 border-secondary">
<span class="material-symbols-outlined text-secondary">receipt_long</span>
<div>
<h5 class="font-label-bold text-label-bold text-on-surface mb-1">Tax Deductible</h5>
<p class="text-sm text-on-surface-variant">The Agnes Kagure Foundation is a registered NGO. You will receive a tax receipt via email immediately after your donation.</p>
</div>
</div>
</div>
</div>
</section>
<!-- Radical Transparency Section -->
<section class="py-section-padding bg-surface-container-lowest">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter">
<div class="flex flex-col md:flex-row items-center justify-between gap-stack-lg border-t border-b border-surface-variant py-stack-lg">
<div class="md:w-2/3">
<h2 class="font-headline-lg text-headline-lg text-primary mb-4">Radical Transparency</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant">We believe you have the right to know exactly how your contributions are utilized. We operate with minimal overhead to ensure maximum impact.</p>
</div>
<div class="md:w-1/3 flex justify-end">
<a href="<?= url('/impact') ?>" class="inline-flex items-center gap-2 px-6 py-3 border-2 border-primary text-primary font-label-bold text-label-bold rounded-lg hover:bg-primary hover:text-on-primary transition-all">
                            View 2023 Annual Report
                            <span class="material-symbols-outlined">download</span>
</a>
</div>
</div>
</div>
</section>
<!-- FAQs -->
<section class="py-section-padding px-margin-mobile md:px-gutter max-w-3xl mx-auto">
<h2 class="font-headline-md text-headline-md text-center text-primary mb-12">Frequently Asked Questions</h2>
<div class="space-y-4">
<details class="group bg-surface rounded-lg soft-shadow [&amp;_summary::-webkit-details-marker]:hidden">
<summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg p-4 text-on-surface font-label-bold text-label-bold">
                        Where does my money go?
                        <span class="shrink-0 transition duration-300 group-open:-rotate-180">
<span class="material-symbols-outlined">expand_more</span>
</span>
</summary>
<p class="mt-4 px-4 pb-4 leading-relaxed text-on-surface-variant text-sm">
                        90% of every donation goes directly to programmatic work (education, healthcare, and water projects). The remaining 10% supports essential administrative and fundraising operations.
                    </p>
</details>
<details class="group bg-surface rounded-lg soft-shadow [&amp;_summary::-webkit-details-marker]:hidden">
<summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg p-4 text-on-surface font-label-bold text-label-bold">
                        Is my online donation secure?
                        <span class="shrink-0 transition duration-300 group-open:-rotate-180">
<span class="material-symbols-outlined">expand_more</span>
</span>
</summary>
<p class="mt-4 px-4 pb-4 leading-relaxed text-on-surface-variant text-sm">
                        Yes. We use industry-standard SSL encryption to protect your personal and payment information. We do not store credit card details on our servers.
                    </p>
</details>
<details class="group bg-surface rounded-lg soft-shadow [&amp;_summary::-webkit-details-marker]:hidden">
<summary class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg p-4 text-on-surface font-label-bold text-label-bold">
                        Can I cancel my monthly donation?
                        <span class="shrink-0 transition duration-300 group-open:-rotate-180">
<span class="material-symbols-outlined">expand_more</span>
</span>
</summary>
<p class="mt-4 px-4 pb-4 leading-relaxed text-on-surface-variant text-sm">
                        Absolutely. You can modify or cancel your recurring donation at any time through our donor portal or by contacting our support team directly.
                    </p>
</details>
</div>
</section>
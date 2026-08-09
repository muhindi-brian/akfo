<?php
/** @var array $site */
/** @var array $contact */
/** @var array $errors */
/** @var bool $success */

$fieldError = static function (string $field) use ($errors): string {
    return isset($errors[$field]) ? 'border-error focus:border-error' : '';
};
?>
<!-- Hero Section -->
<header class="relative w-full h-[45vh] md:h-[60vh] min-h-[280px] md:min-h-[500px] akfo-hero akfo-hero--contact flex items-center justify-center overflow-hidden">
    <div
        class="absolute inset-0 z-0 bg-cover bg-center"
        style="background-image: url('<?= e($contact['hero']['image']) ?>')"
        role="img"
        aria-label="<?= e($contact['hero']['image_alt']) ?>"
    ></div>
    <div class="absolute inset-0 z-10 bg-gradient-to-t from-primary/80 to-primary/30 mix-blend-multiply"></div>
    <div class="relative z-20 max-w-container-max mx-auto px-margin-mobile md:px-gutter text-center w-full">
        <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-white mb-6 animate-fade-in-up"><?= e($contact['hero']['title']) ?></h1>
        <p class="font-body-lg text-body-lg text-white/90 max-w-2xl mx-auto"><?= e($contact['hero']['subtitle']) ?></p>
    </div>
</header>

<?php if ($success): ?>
    <?= view('components.alert', ['type' => 'success', 'message' => 'Thank you. Your message has been received and our team will respond shortly.']) ?>
<?php endif; ?>
<?php if (!empty($errors['form'] ?? null)): ?>
    <?= view('components.alert', ['type' => 'error', 'message' => $errors['form']]) ?>
<?php endif; ?>

<!-- Main Content -->
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter py-section-padding">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-gutter">
        <!-- Contact Information -->
        <div class="lg:col-span-5 flex flex-col gap-8">
            <div>
                <h2 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-4"><?= e($contact['office']['heading']) ?></h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-6"><?= e($contact['office']['description']) ?></p>
            </div>

            <div class="flex flex-col gap-6">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary-container" style="font-variation-settings: 'FILL' 1;" aria-hidden="true">location_on</span>
                    </div>
                    <div>
                        <h3 class="font-label-bold text-label-bold text-on-surface mb-1">Address</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">
                            <?= e($site['address']['line1']) ?><br/>
                            <?= e($site['address']['line2']) ?><br/>
                            <?= e($site['address']['city']) ?>
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary-container" style="font-variation-settings: 'FILL' 1;" aria-hidden="true">call</span>
                    </div>
                    <div>
                        <h3 class="font-label-bold text-label-bold text-on-surface mb-1">Phone</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">
                            <a href="tel:<?= e(preg_replace('/\s+/', '', $site['phone'])) ?>" class="hover:text-primary transition-colors"><?= e($site['phone']) ?></a>
                            <?php if (!empty($site['phone_secondary'])): ?><br/>
                            <a href="tel:<?= e(preg_replace('/\s+/', '', $site['phone_secondary'])) ?>" class="hover:text-primary transition-colors"><?= e($site['phone_secondary']) ?></a><?php endif; ?>
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary-container" style="font-variation-settings: 'FILL' 1;" aria-hidden="true">mail</span>
                    </div>
                    <div>
                        <h3 class="font-label-bold text-label-bold text-on-surface mb-1">Email</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">
                            <a href="mailto:<?= e($site['email']) ?>" class="hover:text-primary transition-colors"><?= e($site['email']) ?></a><br/>
                            <a href="mailto:<?= e($site['support_email']) ?>" class="hover:text-primary transition-colors"><?= e($site['support_email']) ?></a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-4 pt-6 border-t border-surface-variant">
                <h3 class="font-label-bold text-label-bold text-on-surface mb-4"><?= e($contact['social_heading']) ?></h3>
                <div class="flex gap-4">
                    <?php foreach ($site['social'] as $social): ?>
                        <a
                            href="<?= e($social['url']) ?>"
                            class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant hover:bg-primary-container hover:text-white transition-colors duration-300"
                            aria-label="<?= e($social['label']) ?>"
                        >
                            <span class="material-symbols-outlined" aria-hidden="true"><?= e($social['icon']) ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="lg:col-span-7">
            <div class="bg-surface-container-lowest rounded-xl p-8 md:p-12 soft-shadow border border-surface-variant/30 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-secondary-container/20 rounded-bl-full -mr-16 -mt-16 pointer-events-none" aria-hidden="true"></div>
                <h3 class="font-headline-md text-headline-md text-primary mb-2">Send a Message</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-8">Fill out the form below and our team will get back to you shortly.</p>

                <form class="flex flex-col gap-6" action="<?= url('/contact') ?>" method="POST" novalidate>
                    <?= csrf_field() ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2">
                            <label class="font-label-bold text-label-bold text-on-surface" for="name">Full Name</label>
                            <input
                                class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary-container focus:ring-0 rounded-t-md px-4 py-3 transition-colors text-on-surface font-body-md <?= e($fieldError('name')) ?>"
                                id="name"
                                name="name"
                                value="<?= e(old('name')) ?>"
                                placeholder="Jane Doe"
                                type="text"
                                required
                                autocomplete="name"
                                <?= isset($errors['name']) ? 'aria-invalid="true" aria-describedby="name-error"' : '' ?>
                            />
                            <?php if (isset($errors['name'])): ?>
                                <p id="name-error" class="text-sm text-error" role="alert"><?= e($errors['name']) ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="font-label-bold text-label-bold text-on-surface" for="email">Email Address</label>
                            <input
                                class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary-container focus:ring-0 rounded-t-md px-4 py-3 transition-colors text-on-surface font-body-md <?= e($fieldError('email')) ?>"
                                id="email"
                                name="email"
                                value="<?= e(old('email')) ?>"
                                placeholder="jane@example.com"
                                type="email"
                                required
                                autocomplete="email"
                                <?= isset($errors['email']) ? 'aria-invalid="true" aria-describedby="email-error"' : '' ?>
                            />
                            <?php if (isset($errors['email'])): ?>
                                <p id="email-error" class="text-sm text-error" role="alert"><?= e($errors['email']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="font-label-bold text-label-bold text-on-surface" for="subject">Subject</label>
                        <select
                            class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary-container focus:ring-0 rounded-t-md px-4 py-3 transition-colors text-on-surface font-body-md appearance-none <?= e($fieldError('subject')) ?>"
                            id="subject"
                            name="subject"
                            required
                            <?= isset($errors['subject']) ? 'aria-invalid="true" aria-describedby="subject-error"' : '' ?>
                        >
                            <option value="" disabled <?= old('subject') === '' ? 'selected' : '' ?>>Select an inquiry type</option>
                            <?php foreach ($contact['subjects'] as $value => $label): ?>
                                <option value="<?= e($value) ?>" <?= old('subject') === $value ? 'selected' : '' ?>><?= e($label) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['subject'])): ?>
                            <p id="subject-error" class="text-sm text-error" role="alert"><?= e($errors['subject']) ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="font-label-bold text-label-bold text-on-surface" for="message">Message</label>
                        <textarea
                            class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary-container focus:ring-0 rounded-t-md px-4 py-3 transition-colors text-on-surface font-body-md resize-none <?= e($fieldError('message')) ?>"
                            id="message"
                            name="message"
                            placeholder="How can we help you?"
                            rows="5"
                            required
                            <?= isset($errors['message']) ? 'aria-invalid="true" aria-describedby="message-error"' : '' ?>
                        ><?= e(old('message')) ?></textarea>
                        <?php if (isset($errors['message'])): ?>
                            <p id="message-error" class="text-sm text-error" role="alert"><?= e($errors['message']) ?></p>
                        <?php endif; ?>
                    </div>

                    <button class="mt-4 bg-primary-container text-white font-label-bold text-label-bold py-4 px-8 rounded-lg hover:bg-primary shadow-md flex items-center justify-center gap-2 self-start group btn-press" type="submit">
                        <span>Send Message</span>
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform" aria-hidden="true">arrow_forward</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

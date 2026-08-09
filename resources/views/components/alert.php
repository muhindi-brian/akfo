<?php
/** @var string $type */
/** @var string $message */
$styles = $type === 'success'
    ? 'bg-primary-fixed/30 border-primary text-primary'
    : 'bg-error-container border-error text-on-error-container';
?>
<div class="max-w-container-max mx-auto px-margin-mobile md:px-gutter pt-6 motion-alert" role="alert" aria-live="polite">
    <div class="<?= e($styles) ?> border rounded-xl px-6 py-4 font-body-md">
        <?= e($message) ?>
    </div>
</div>

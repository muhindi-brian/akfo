<?php
/** @var array $errors */
/** @var bool $success */
?>
<?php if ($success): ?>
    <?= view('components.alert', ['type' => 'success', 'message' => 'Thank you for your partnership inquiry. Our team will be in touch soon.']) ?>
<?php endif; ?>
<?php if (!empty($errors)): ?>
    <?= view('components.alert', ['type' => 'error', 'message' => implode(' ', array_values($errors))]) ?>
<?php endif; ?>
<?php include BASE_PATH . '/resources/views/partials/stitch/partners.php'; ?>

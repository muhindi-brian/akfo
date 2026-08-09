<?php
/** @var array $errors */
/** @var bool $success */
?>
<?php if ($success): ?>
    <?= view('components.alert', ['type' => 'success', 'message' => 'Thank you for your interest in volunteering. We will contact you shortly.']) ?>
<?php endif; ?>
<?php if (!empty($errors)): ?>
    <?= view('components.alert', ['type' => 'error', 'message' => implode(' ', array_values($errors))]) ?>
<?php endif; ?>
<?php include BASE_PATH . '/resources/views/partials/stitch/get-involved.php'; ?>

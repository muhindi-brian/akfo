<?php

declare(strict_types=1);

namespace App\Services;

final class ContactService
{
    public function storeMessage(array $data, string $type): void
    {
        $dir = BASE_PATH . '/storage/messages';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $payload = [
            'type' => $type,
            'submitted_at' => date('c'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'data' => $data,
        ];

        $filename = $dir . '/' . date('Ymd-His') . '-' . bin2hex(random_bytes(4)) . '.json';
        file_put_contents($filename, json_encode($payload, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR), LOCK_EX);

        logger("Stored {$type} message: {$filename}");
    }
}

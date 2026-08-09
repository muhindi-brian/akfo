<?php

declare(strict_types=1);

namespace App\Core;

abstract class Controller
{
    protected function render(string $view, array $data = []): string
    {
        $defaults = [
            'site' => data('site'),
            'navigation' => data('navigation'),
            'currentPath' => parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/',
        ];

        return View::render('layouts/main', array_merge($defaults, $data, [
            'content' => View::render('pages/' . $view, array_merge($defaults, $data)),
        ]));
    }

    protected function json(array $payload, int $status = 200): string
    {
        http_response_code($status);
        header('Content-Type: application/json');
        return json_encode($payload, JSON_THROW_ON_ERROR);
    }

    protected function validate(array $input, array $rules): array
    {
        $errors = [];

        foreach ($rules as $field => $ruleString) {
            $value = trim((string) ($input[$field] ?? ''));
            $rulesList = explode('|', $ruleString);

            foreach ($rulesList as $rule) {
                if ($rule === 'required' && $value === '') {
                    $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required.';
                    break;
                }

                if ($rule === 'email' && $value !== '' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$field] = 'Please enter a valid email address.';
                    break;
                }

                if (str_starts_with($rule, 'max:')) {
                    $max = (int) substr($rule, 4);
                    if (strlen($value) > $max) {
                        $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . " must not exceed {$max} characters.";
                        break;
                    }
                }
            }
        }

        return $errors;
    }

    protected function rememberInput(array $input): void
    {
        $_SESSION['_old_input'] = $input;
    }

    protected function clearOldInput(): void
    {
        unset($_SESSION['_old_input']);
    }
}

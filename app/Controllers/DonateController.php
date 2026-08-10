<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Services\ContactService;

final class DonateController extends Controller
{
    public function index(): string
    {
        return $this->render('donate', [
            'errors' => flash('errors') ?? [],
            'success' => (bool) flash('success'),
        ]);
    }

    public function submit(): string
    {
        if (!verify_csrf($_POST['_token'] ?? null)) {
            flash('errors', ['form' => 'Invalid session. Please try again.']);
            redirect('/donate');
        }

        $input = [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'amount' => $_POST['amount'] ?? '',
            'program' => $_POST['program'] ?? '',
            'message' => $_POST['message'] ?? '',
        ];

        $errors = $this->validate($input, [
            'name' => 'required|max:120',
            'email' => 'required|email|max:180',
            'amount' => 'required|max:20',
        ]);

        if (!is_numeric($input['amount']) || (float) $input['amount'] <= 0) {
            $errors['amount'] = 'Please enter a valid donation amount.';
        }

        if ($errors !== []) {
            $this->rememberInput($input);
            flash('errors', $errors);
            redirect('/donate');
        }

        (new ContactService())->storeMessage($input, 'donation');
        $this->clearOldInput();
        flash('success', true);
        redirect('/donate');
    }
}

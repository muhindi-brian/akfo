<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Services\ContactService;

final class PartnersController extends Controller
{
    public function index(): string
    {
        return $this->render('partners', [
            'errors' => flash('errors') ?? [],
            'success' => (bool) flash('success'),
        ]);
    }

    public function submit(): string
    {
        if (!verify_csrf($_POST['_token'] ?? null)) {
            flash('errors', ['form' => 'Invalid session. Please try again.']);
            redirect('/partners');
        }

        $input = [
            'organization' => $_POST['organization'] ?? '',
            'contact_person' => $_POST['contact_person'] ?? '',
            'email' => $_POST['email'] ?? '',
            'partnership_type' => $_POST['partnership_type'] ?? '',
            'message' => $_POST['message'] ?? '',
        ];

        $errors = $this->validate($input, [
            'organization' => 'required|max:180',
            'contact_person' => 'required|max:120',
            'email' => 'required|email|max:180',
            'partnership_type' => 'required|max:80',
            'message' => 'required|max:5000',
        ]);

        if ($errors !== []) {
            $this->rememberInput($input);
            flash('errors', $errors);
            redirect('/partners');
        }

        (new ContactService())->storeMessage($input, 'partnership');
        $this->clearOldInput();
        flash('success', true);
        redirect('/partners');
    }
}

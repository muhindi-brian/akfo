<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Services\ContactService;

final class GetInvolvedController extends Controller
{
    public function index(): string
    {
        return $this->render('get-involved', [
            'pageTitle' => 'Get Involved | Agnes Kagure Foundation',
            'pageDescription' => 'Volunteer, partner, and join the movement for sustainable community development with the Agnes Kagure Foundation.',
            'errors' => flash('errors') ?? [],
            'success' => (bool) flash('success'),
        ]);
    }

    public function submit(): string
    {
        if (!verify_csrf($_POST['_token'] ?? null)) {
            flash('errors', ['form' => 'Invalid session. Please try again.']);
            redirect('/get-involved');
        }

        $input = [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'interest' => $_POST['interest'] ?? '',
            'message' => $_POST['message'] ?? '',
        ];

        $errors = $this->validate($input, [
            'name' => 'required|max:120',
            'email' => 'required|email|max:180',
            'interest' => 'required|max:120',
            'message' => 'required|max:5000',
        ]);

        if ($errors !== []) {
            $this->rememberInput($input);
            flash('errors', $errors);
            redirect('/get-involved');
        }

        (new ContactService())->storeMessage($input, 'volunteer');
        $this->clearOldInput();
        flash('success', true);
        redirect('/get-involved');
    }
}

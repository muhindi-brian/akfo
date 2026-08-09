<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Services\ContactService;

final class ContactController extends Controller
{
    public function index(): string
    {
        return $this->render('contact', [
            'pageTitle' => 'Contact Us | Agnes Kagure Foundation',
            'pageDescription' => 'Contact the Agnes Kagure Foundation at Aristocrats House, Nairobi. Call +254 111 927 044 or email info@akfo.org for partnerships and program inquiries.',
            'pageImage' => data('contact')['hero']['image'],
            'contact' => data('contact'),
            'errors' => flash('errors') ?? [],
            'success' => (bool) flash('success'),
        ]);
    }

    public function submit(): string
    {
        if (!verify_csrf($_POST['_token'] ?? null)) {
            flash('errors', ['form' => 'Invalid session. Please try again.']);
            redirect('/contact');
        }

        $input = [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'subject' => $_POST['subject'] ?? '',
            'message' => $_POST['message'] ?? '',
        ];

        $errors = $this->validate($input, [
            'name' => 'required|max:120',
            'email' => 'required|email|max:180',
            'subject' => 'required|max:80',
            'message' => 'required|max:5000',
        ]);

        if ($errors !== []) {
            $this->rememberInput($input);
            flash('errors', $errors);
            redirect('/contact');
        }

        (new ContactService())->storeMessage($input, 'contact');
        $this->clearOldInput();
        flash('success', true);
        redirect('/contact');
    }
}

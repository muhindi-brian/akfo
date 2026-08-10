<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class ErrorController extends Controller
{
    public function notFound(): string
    {
        http_response_code(404);

        return $this->render('errors/404', [
            'pageTitle' => 'Page Not Found | Agnes Kagure Foundation',
            'pageDescription' => 'The page you requested could not be found on the Agnes Kagure Foundation website.',
            'pageRobots' => 'noindex, nofollow',
        ]);
    }

    public function forbidden(): string
    {
        http_response_code(403);

        return $this->render('errors/403', [
            'pageTitle' => 'Access Denied | Agnes Kagure Foundation',
            'pageDescription' => 'You do not have permission to access this resource.',
            'pageRobots' => 'noindex, nofollow',
        ]);
    }

    public function serverError(): string
    {
        http_response_code(500);

        return $this->render('errors/500', [
            'pageTitle' => 'Server Error | Agnes Kagure Foundation',
            'pageDescription' => 'Something went wrong. Please try again later.',
            'pageRobots' => 'noindex, nofollow',
        ]);
    }
}

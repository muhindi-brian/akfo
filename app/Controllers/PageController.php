<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class PageController extends Controller
{
    public function privacy(): string
    {
        return $this->render('legal/privacy', [
            'pageTitle' => 'Privacy Policy | Agnes Kagure Foundation',
            'pageDescription' => 'Privacy policy for the Agnes Kagure Foundation website.',
        ]);
    }

    public function terms(): string
    {
        return $this->render('legal/terms', [
            'pageTitle' => 'Terms of Service | Agnes Kagure Foundation',
            'pageDescription' => 'Terms of service for the Agnes Kagure Foundation website.',
        ]);
    }
}

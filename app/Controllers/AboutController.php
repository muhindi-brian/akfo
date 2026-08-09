<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class AboutController extends Controller
{
    public function index(): string
    {
        return $this->render('about', [
            'pageTitle' => 'About Us | Agnes Kagure Foundation',
            'pageDescription' => 'Learn about the Agnes Kagure Foundation journey, leadership, vision, mission, and commitment to transparent community development.',
            'pageScripts' => ['smooth-scroll.js'],
        ]);
    }
}

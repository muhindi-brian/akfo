<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class HomeController extends Controller
{
    public function index(): string
    {
        return $this->render('home', [
            'pageTitle' => 'Agnes Kagure Foundation | Turning Potentials into Possibilities',
            'pageDescription' => data('site')['description'],
            'pageScripts' => ['counters.js'],
        ]);
    }
}

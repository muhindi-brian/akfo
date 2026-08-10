<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class AboutController extends Controller
{
    public function index(): string
    {
        return $this->render('about');
    }
}

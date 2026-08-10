<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class ProgramsController extends Controller
{
    public function index(): string
    {
        return $this->render('programs');
    }
}

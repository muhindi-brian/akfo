<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class ProgramsController extends Controller
{
    public function index(): string
    {
        return $this->render('programs', [
            'pageTitle' => 'Our Programs | Agnes Kagure Foundation',
            'pageDescription' => 'Explore transformative programs in education, healthcare, women empowerment, youth development, and economic empowerment across Kenya.',
        ]);
    }
}

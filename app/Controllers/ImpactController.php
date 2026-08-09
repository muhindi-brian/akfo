<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class ImpactController extends Controller
{
    public function index(): string
    {
        return $this->render('impact', [
            'pageTitle' => 'Impact | Agnes Kagure Foundation',
            'pageDescription' => 'Explore measurable impact across education, healthcare, and economic empowerment programs throughout Kenya.',
        ]);
    }
}

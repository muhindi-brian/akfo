<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class GalleryController extends Controller
{
    public function index(): string
    {
        return $this->render('gallery', [
            'pageTitle' => 'Impact Gallery | Agnes Kagure Foundation',
            'pageDescription' => 'Explore photos and videos documenting community transformation through the Agnes Kagure Foundation programs.',
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class EventsController extends Controller
{
    public function index(): string
    {
        return $this->render('events', [
            'pageTitle' => 'Events & Opportunities | Agnes Kagure Foundation',
            'pageDescription' => 'Discover upcoming Agnes Kagure Foundation events, community drives, and engagement opportunities across Kenya.',
        ]);
    }
}

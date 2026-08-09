<?php

declare(strict_types=1);

use App\Controllers\AboutController;
use App\Controllers\ContactController;
use App\Controllers\DonateController;
use App\Controllers\ErrorController;
use App\Controllers\EventsController;
use App\Controllers\GalleryController;
use App\Controllers\GetInvolvedController;
use App\Controllers\HomeController;
use App\Controllers\ImpactController;
use App\Controllers\NewsController;
use App\Controllers\PageController;
use App\Controllers\PartnersController;
use App\Controllers\ProgramsController;
use App\Controllers\SeoController;
use App\Core\Router;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [AboutController::class, 'index']);
$router->get('/programs', [ProgramsController::class, 'index']);
$router->get('/impact', [ImpactController::class, 'index']);
$router->get('/news', [NewsController::class, 'index']);
$router->get('/news/{slug}', [NewsController::class, 'show']);
$router->get('/partners', [PartnersController::class, 'index']);
$router->post('/partners', [PartnersController::class, 'submit']);
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact', [ContactController::class, 'submit']);
$router->get('/donate', [DonateController::class, 'index']);
$router->post('/donate', [DonateController::class, 'submit']);
$router->get('/get-involved', [GetInvolvedController::class, 'index']);
$router->post('/get-involved', [GetInvolvedController::class, 'submit']);
$router->get('/events', [EventsController::class, 'index']);
$router->get('/gallery', [GalleryController::class, 'index']);

$router->get('/robots.txt', [SeoController::class, 'robots']);
$router->get('/sitemap.xml', [SeoController::class, 'sitemap']);

$router->get('/privacy', [PageController::class, 'privacy']);
$router->get('/terms', [PageController::class, 'terms']);

$router->get('/403', [ErrorController::class, 'forbidden']);
$router->get('/500', [ErrorController::class, 'serverError']);

return $router;

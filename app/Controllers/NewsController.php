<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class NewsController extends Controller
{
    public function index(): string
    {
        return $this->render('news', [
            'pageTitle' => 'Stories of Change | Agnes Kagure Foundation',
            'pageDescription' => 'Read news, impact stories, and updates from the Agnes Kagure Foundation across Kenya.',
            'articles' => data('news'),
        ]);
    }

    public function show(string $slug): string
    {
        $articles = data('news');
        $article = null;

        foreach ($articles as $item) {
            if ($item['slug'] === $slug) {
                $article = $item;
                break;
            }
        }

        if ($article === null) {
            return (new ErrorController())->notFound();
        }

        return $this->render('news-show', [
            'pageTitle' => $article['title'] . ' | Agnes Kagure Foundation',
            'pageDescription' => $article['excerpt'],
            'pageImage' => $article['image'],
            'article' => $article,
        ]);
    }
}

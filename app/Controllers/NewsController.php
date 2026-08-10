<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

final class NewsController extends Controller
{
    public function index(): string
    {
        return $this->render('news', [
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
            'article' => $article,
            'pageTitle' => $article['title'] . ' | AKFO',
            'pageDescription' => $article['excerpt'],
            'pageImage' => $article['image'],
            'pageKeywords' => $article['category'] . ', AKFO news, Agnes Kagure Foundation, Kenya NGO',
        ]);
    }
}

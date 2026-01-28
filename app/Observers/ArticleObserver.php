<?php

namespace App\Observers;

use App\Models\Article;
use App\Services\SitemapGenerator;

class ArticleObserver
{
    public function created(Article $article): void
    {
        SitemapGenerator::generate();
    }

    public function updated(Article $article): void
    {
        SitemapGenerator::generate();
    }

    public function deleted(Article $article): void
    {
        SitemapGenerator::generate();
    }
}

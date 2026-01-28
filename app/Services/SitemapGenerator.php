<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Page;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapGenerator
{
    public static function generate(): void
    {
        $sitemap = Sitemap::create();

        // Add all live pages (excluding no_index pages)
        Page::where('live', true)
            ->where(function ($query) {
                $query->where('no_index', false)->orWhereNull('no_index');
            })
            ->get()
            ->each(function (Page $page) use ($sitemap) {
                $url = $page->lang === 'en'
                    ? url($page->slug ?: '/')
                    : url($page->lang . '/' . $page->slug);

                $sitemap->add(
                    Url::create($url)
                        ->setLastModificationDate($page->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.9)
                );
            });

        // Add all articles (excluding no_index and expired articles)
        Article::where(function ($query) {
                $query->where('no_index', false)->orWhereNull('no_index');
            })
            ->where(function ($query) {
                $query->where('expired', false)->orWhereNull('expired');
            })
            ->get()
            ->each(function (Article $article) use ($sitemap) {
                $url = $article->lang === 'en'
                    ? url('news/' . $article->slug)
                    : url($article->lang . '/news/' . $article->slug);

                $sitemap->add(
                    Url::create($url)
                        ->setLastModificationDate($article->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.8)
                );
            });

        // Add news index pages
        $sitemap->add(
            Url::create(url('/news'))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.7)
        );

        $sitemap->add(
            Url::create(url('/fr/news'))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.7)
        );

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}

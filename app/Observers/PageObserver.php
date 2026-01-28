<?php

namespace App\Observers;

use App\Models\Page;
use App\Services\SitemapGenerator;

class PageObserver
{
    public function created(Page $page): void
    {
        SitemapGenerator::generate();
    }

    public function updated(Page $page): void
    {
        SitemapGenerator::generate();
    }

    public function deleted(Page $page): void
    {
        SitemapGenerator::generate();
    }
}

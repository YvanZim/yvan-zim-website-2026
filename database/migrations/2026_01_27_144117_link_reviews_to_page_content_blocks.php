<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Populate review_ids on reviews/location content blocks using
     * the old page_sections → reviews relationship.
     */
    public function up(): void
    {
        $sectionToPage = DB::table('page_sections')->pluck('page_id', 'id');

        // Group review IDs by page_id
        $pageReviews = [];
        foreach (DB::table('reviews')->get() as $review) {
            $pageId = $sectionToPage[$review->section_id] ?? null;
            if ($pageId) {
                $pageReviews[$pageId][] = $review->id;
            }
        }

        $reviewBlockTypes = [
            'components.sections.reviews',
            'components.sections.location',
        ];

        foreach ($pageReviews as $pageId => $reviewIds) {
            $page = DB::table('pages')->where('id', $pageId)->first();
            if (! $page || ! $page->content) {
                continue;
            }

            $content = json_decode($page->content, true);
            if (! is_array($content)) {
                continue;
            }

            $changed = false;
            foreach ($content as &$block) {
                if (in_array($block['type'], $reviewBlockTypes)) {
                    $block['data']['review_ids'] = array_map('strval', $reviewIds);
                    $changed = true;
                }
            }
            unset($block);

            if ($changed) {
                DB::table('pages')
                    ->where('id', $pageId)
                    ->update(['content' => json_encode($content)]);
            }
        }
    }

    public function down(): void
    {
        $reviewBlockTypes = [
            'components.sections.reviews',
            'components.sections.location',
        ];

        foreach (DB::table('pages')->whereNotNull('content')->get() as $page) {
            $content = json_decode($page->content, true);
            if (! is_array($content)) {
                continue;
            }

            $changed = false;
            foreach ($content as &$block) {
                if (in_array($block['type'], $reviewBlockTypes)) {
                    unset($block['data']['review_ids']);
                    $changed = true;
                }
            }
            unset($block);

            if ($changed) {
                DB::table('pages')
                    ->where('id', $page->id)
                    ->update(['content' => json_encode($content)]);
            }
        }
    }
};

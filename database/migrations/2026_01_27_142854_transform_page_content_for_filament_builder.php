<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Add unique keys to each content block so Filament Builder can manage them.
     */
    public function up(): void
    {
        $pages = DB::table('pages')->whereNotNull('content')->get();

        foreach ($pages as $page) {
            $sections = json_decode($page->content, true);

            if (! is_array($sections)) {
                continue;
            }

            $transformed = array_map(function ($section) {
                if (! isset($section['key'])) {
                    $section['key'] = Str::uuid()->toString();
                }
                return $section;
            }, $sections);

            DB::table('pages')
                ->where('id', $page->id)
                ->update(['content' => json_encode($transformed)]);
        }
    }

    public function down(): void
    {
        $pages = DB::table('pages')->whereNotNull('content')->get();

        foreach ($pages as $page) {
            $sections = json_decode($page->content, true);

            if (! is_array($sections)) {
                continue;
            }

            $reverted = array_map(function ($section) {
                unset($section['key']);
                return $section;
            }, $sections);

            DB::table('pages')
                ->where('id', $page->id)
                ->update(['content' => json_encode($reverted)]);
        }
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up(): void
    {
       $pages = Page::all();
       foreach($pages as $page){
           $content = [];
           foreach($page->sections as $section){
               $template = DB::table('templates')->where('id', $section->template_id)->first();
               $section = $section->toArray();
               unset($section['id']);
               unset($section['created_at']);
               unset($section['updated_at']);
               unset($section['page_id']);
               unset($section['template_id']);
               array_push($content,[
                   'type' => $template->ref,
                   'data' => $section
               ]);
           }
           $page->content = $content;
           $page->save();
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

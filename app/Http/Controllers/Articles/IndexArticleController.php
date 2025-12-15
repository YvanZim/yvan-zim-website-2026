<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexArticleController extends Controller
{
    public function __invoke($lang = null)
    {
        if($lang != 'fr' && $lang != null){
            abort(404);
        }

        if($lang == null){
            $lang = 'en';
        }

        // where('lang', $lang)->
        $articles = Article::where('no_index', 0)->orderBy('date', 'DESC')->get();
        return view('articles.index')->with('articles', $articles);

    }

}

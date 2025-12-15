<?php

namespace App\Http\Controllers\Articles;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ShowArticleController extends Controller
{

    public function __invoke(string $lang = 'en', string $slug){

        $article = Article::where('slug', $slug)->where('lang', $lang)->first();
        if( !isset($article) ){
            abort(404);
        }

        if( $article->type == 1){
            return view('articles.showLayout')->with('article', $article);
        }

        return view('articles.newsLayout')->with('article', $article);
    }

}

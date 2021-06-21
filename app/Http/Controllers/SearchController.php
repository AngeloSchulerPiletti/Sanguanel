<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ArticleRequireController;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function index($keywords, Request $request){
        $articles = DB::table('articles')->get();
        $corresponding = [];

        $converter = new ArticleRequireController;
        $keywords = $converter->stringToURL($keywords);

        foreach ($articles as $index => $article) {
            $article->keywords = explode(",", $article->keywords);

            foreach ($article->keywords as $value) {
                $value = $converter->stringToURL($value);
                if($keywords == $value){
                    $corresponding[] = Article::all()->where('id', $article->id)->first();
                }
            }
        }
        
        return Inertia::render('public/Views/Searches', ['database' => $corresponding]);
    }
}

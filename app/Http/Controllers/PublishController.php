<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Author;
use App\Models\Article;

class PublishController extends Controller
{
    protected $url_pub = 'public/Views/';



    public function artigos($section = null, $id = null)
    {
        if ($section != null) {
            if ($id != null) {
                return Inertia::render($this->url_pub . 'Articles/ArticleModel', [
                    'subject' => 'artigos',
                    'article_id' => '',
                ]);
            } else {
                return Inertia::render($this->url_pub . 'SubHomes/FromArtigos', [
                    'subject' => $section,
                ]);
            }
        } else {
            return Inertia::render($this->url_pub . 'Artigos');
        }
    }



    public function receitas($section = null, $id = null)
    {
        if ($section != null) {
            if ($id != null) {
                return Inertia::render($this->url_pub . 'Articles/ArticleModel', [
                    'subject' => 'receitas',
                    'article_id' => '',
                ]);
            } else {
                return Inertia::render($this->url_pub . 'SubHomes/FromReceitas', [
                    'subject' => $section,
                ]);
            }
        } else {
            return Inertia::render($this->url_pub . 'Receitas');
        }
    }


    public function institucional($section = null)
    {
        if ($section != null) {
            return Inertia::render($this->url_pub . 'SubHomes/FromInstitucional', [
                'subject' => $section,
            ]);
        } else {
            return Inertia::render($this->url_pub . 'Institucional');
        }
    }


    public function autor()
    {
        $dataAuthor = Author::all();
        return Inertia::render($this->url_pub . 'Autor', ['data' => $dataAuthor[0]]);
    }
}

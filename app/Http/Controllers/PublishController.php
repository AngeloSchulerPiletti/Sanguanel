<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Author;
use App\Models\Article;
use App\Models\SubhomesContent;
use App\Models\InstitucionalPage;

class PublishController extends Controller
{
    protected $url_pub = 'public/Views/';

    public function getPath($path, $subhome, $section)
    {
        if (isset($path)) {
            $actualPath = explode('/', $path);
            if ($actualPath[0] == $subhome && $actualPath[1] == $section) {
                return true;
            }
        }

        return false;
    }


    public function artigos($section = null, $id = null)
    {
        if ($section != null) {
            if ($id != null) { //RETORNA ARTIGO
                $article = Article::where('url', $id)->first();
                if (!$article) {
                    abort(404);
                }

                if ($this->getPath($article->subject, 'artigos', $section)) {
                    return Inertia::render($this->url_pub . "Articles/ArticleModel", ['article' => $article]);
                } else {
                    abort(404);
                }
            } else { //RETORNA SUBHOME
                if ($section == "producao" || $section == "historia" || $section == "curiosidades") {
                    $page = SubhomesContent::all()->where('subject', $section);
                    $articles_list = Article::all()->where('subject', 'artigos/' . $section);

                    return Inertia::render($this->url_pub . 'SubHomes/FromArtigos', [
                        'subject' => $section,
                        'database' => $page,
                        'articles_list' => $articles_list,
                    ]);
                } else {
                    abort(404);
                }
            }
        } else { //RETORNA HOME
            return Inertia::render($this->url_pub . 'Artigos');
        }
    }



    public function receitas($section = null, $id = null)
    {
        if ($section != null) {
            if ($id != null) { //RETORNA RECEITA
                $article = Article::where('url', $id)->first();
                if (!$article) {
                    abort(404);
                }

                if ($this->getPath($article->subject, 'receitas', $section)) {
                    return Inertia::render($this->url_pub . "Articles/ArticleModel", ['article' => $article]);
                } else {
                    abort(404);
                }
            } else { //RETORNA SUBHOME
                if ($section == "comidas" || $section == "drinks") {
                    $page = SubhomesContent::all()->where('subject', $section);
                    $articles_list = Article::all()->where('subject', 'receitas/' . $section);

                    return Inertia::render($this->url_pub . 'SubHomes/FromReceitas', [
                        'subject' => $section,
                        'database' => $page,
                        'articles_list' => $articles_list,
                    ]);
                } else {
                    abort(404);
                }
            }
        } else { //RETORNA HOME
            return Inertia::render($this->url_pub . 'Receitas');
        }
    }


    public function institucional($section = null)
    {
        if ($section != null) {
            $pages = InstitucionalPage::where('subject', 'institucional/'.$section)->first();
            if (!$pages) {
                abort(404);
            }

            if ($this->getPath($pages->subject, 'institucional', $section)) {
                return Inertia::render($this->url_pub . 'SubHomes/FromInstitucional', [
                    'article' => $pages,
                    'subject' => $section,
                ]);
            } else {
                abort(404);
            }
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PublishController extends Controller
{
    protected $url_pub = 'public/Views/';



    public function artigos($section = null, $id = null)
    {
        if ($section != null) {
            if ($id != null) {
                return Inertia::render($this->url_pub . 'Articles/ArticleModel', [
                    'subject' => 'artigos',
                    'id' => '',
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
                    'id' => '',
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
        return Inertia::render($this->url_pub . 'Autor');
    }
}

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
                echo $id.' ARTIGO SETADO!<BR>';
            }
            else{
                return Inertia::render($this->url_base.'SubHomes/FromArtigos');
            }
        } else {
            return Inertia::render($this->url_base.'Articles');
        }
    }



    public function receitas($section = null, $id = null)
    {
        if ($section != null) {
            if ($id != null) {
                echo $id.' ARTIGO SETADO!<BR>';
            }
            else{
                return Inertia::render($this->url_base.'SubHomes/FromReceitas');
            }
        } else {
            return Inertia::render($this->url_base.'Receitas');
        }
    }


    public function institucional($section = null, $id = null)
    {
        if ($section != null) {
            if ($id != null) {
                echo $id.' ARTIGO SETADO!<BR>';
            }
            else{
                return Inertia::render($this->url_base.'SubHomes/FromInstitucional');
            }
        } else {
            return Inertia::render($this->url_base.'Institucional');
        }
    }


    public function autor($section = null)
    {
        if ($section != null) {
            //
        } else {
            return Inertia::render($this->url_base.'Autor');
        }
    }
}

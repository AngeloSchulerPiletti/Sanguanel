<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PublishController extends Controller
{
    // public function index(){

    // }

    // public function historia(){
    //     echo "historia!";
    // }
    // public function producao(){

    // }
    // public function curiosidades(){

    // }

    public function artigos($section = null, $id = null)
    {
        if ($section != null) {
            if ($id != null) {
                echo $id.' ARTIGO SETADO!<BR>';
            }
            else{
                echo $section.'HOME SETADA!';
            }
        } else {
            echo 'HOME DOS ARTIGOS!';
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class RouteController extends Controller
{
    protected $url_pub = 'public/Views/';
    protected $url_adm = 'admin/Views/';



    /*+=================================================+
      |                   PUBLIC                        |
      +=================================================+*/
    public function index(){
        return Inertia::render($this->url_pub.'HomePage', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            // 'laravelVersion' => Application::VERSION,
            // 'phpVersion' => PHP_VERSION,
        ]);
    }


    


    /*+=================================================+
      |                     ADMIM                       |
      +=================================================+*/
    // public function logged(){
    //     return Inertia::render($this->url_adm.'Dashboard');
    // }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class RouteController extends Controller
{
    /*+=================================================+
      |                   PUBLIC                        |
      +=================================================+*/
    public function index(){
        return Inertia::render('public/Views/HomePage', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            // 'laravelVersion' => Application::VERSION,
            // 'phpVersion' => PHP_VERSION,
        ]);
    }


    


    /*+=================================================+
      |                     ADMIM                       |
      +=================================================+*/
    public function logged(){
        return Inertia::render('adim/Views/Dashboard');
    }
}

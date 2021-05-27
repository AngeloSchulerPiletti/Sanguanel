<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class RouteController extends Controller
{
    public function index(){
        return Inertia::render('Views/HomePage', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            // 'laravelVersion' => Application::VERSION,
            // 'phpVersion' => PHP_VERSION,
        ]);
    }


    public function home(){
        dd("LOGADO");
    }
    public function home1(){
        dd("NÃO LOGADO");
    }

    public function logged(){
        return Inertia::render('Views/Auth/Dashboard');
    }
}

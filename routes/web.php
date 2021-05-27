<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RouteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RouteController::class, 'index']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/home', [RouteController::class, 'home']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/home1', [RouteController::class, 'home1']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [RouteController::class, 'logged'])->name('dashboard');

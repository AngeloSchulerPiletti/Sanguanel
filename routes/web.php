<?php

use App\Http\Controllers\NewsletterController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\PublishController;

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



Route::group(['prefix'=>'artigos'], function(){
    Route::get('/',                 [PublishController::class, 'artigos']);
    Route::get('/{section}',        [PublishController::class, 'artigos']);
    Route::get('/{section}/{id}',   [PublishController::class, 'artigos']);
});

Route::group(['prefix'=>'receitas'], function(){
    Route::get('/',                  [PublishController::class, 'receitas']);
    Route::get('/{section}',         [PublishController::class, 'receitas']);
    Route::get('/{section}/{id}',    [PublishController::class, 'receitas']);
});

Route::group(['prefix'=>'institucional'], function(){
    Route::get('/',                  [PublishController::class, 'institucional']);
    Route::get('/{section}',         [PublishController::class, 'institucional']);
});

Route::group(['prefix'=>'autor'], function(){
    Route::get('/',                  [PublishController::class, 'autor']);
});


Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [RouteController::class, 'logged'])->name('dashboard');


Route::middleware('admin')->get('/admin', [RouteController::class, 'admin'])->name('admin');



require_once __DIR__ . "/fortify.php";
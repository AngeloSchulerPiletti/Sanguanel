<?php

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
    // Route::get('/',              [PublishController::class, 'index']);
    // Route::get('/historia',      [PublishController::class, 'historia']);
    // Route::get('/producao',      [PublishController::class, 'producao']);
    // Route::get('/curiosidades',  [PublishController::class, 'curiosidades']);
    Route::get('/',             [PublishController::class, 'artigos']);
    Route::get('/{section}',    [PublishController::class, 'artigos']);
    Route::get('/{section}/{id}',    [PublishController::class, 'artigos']);
});





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [RouteController::class, 'logged'])->name('dashboard');




require_once __DIR__ . "/fortify.php";
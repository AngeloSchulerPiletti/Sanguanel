<?php

use App\Http\Controllers\NewsletterController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ArticleRequireController;

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





Route::prefix('artigos')->group(function(){
    Route::get('/',                 [PublishController::class, 'artigos']);
    Route::get('/{section}',        [PublishController::class, 'artigos']);
    Route::get('/{section}/{id}',   [PublishController::class, 'artigos']);
});

Route::prefix('receitas')->group(function(){
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


Route::name('account.')->middleware('auth:sanctum', 'verified')->group(function(){

    Route::group(['prefix'=>'conta'], function(){
        Route::get('/', [AccountController::class, 'index'])->name('');

        Route::get('/perfil', [AccountController::class, 'profile'])->name('profile');

    });    
});



Route::name('admin.')->middleware('admin')->group(function(){

    Route::group(['prefix'=>'admin'], function(){
        Route::get('/', [AdminController::class, 'admin'])->name('');

        Route::get('/database',                   [AdminController::class, 'database'])->name('database');
        Route::get('/nova-publicacao',            [AdminController::class, 'pubs'])->name('newpub');
        Route::get('/alterar-pagina',             [AdminController::class, 'pages'])->name('updatepages');
        Route::get('/enviar-newsletter',          [AdminController::class, 'news'])->name('news');

        Route::post('/database',                   [AdminController::class, 'Pdatabase'])->name('Pdatabase');
        Route::post('/publicando',                 [AdminController::class, 'Ppubs'])->name('Pnewpub');
        Route::post('/alterar-pagina',             [AdminController::class, 'Ppages'])->name('Pupdatepages');
        Route::post('/enviar-newsletter',          [AdminController::class, 'Pnews'])->name('Pnews');


        Route::post('/nova-publicacao',            [ArticleRequireController::class, 'require'])->name('articlerequire');


    });    
});





require_once __DIR__ . "/fortify.php";
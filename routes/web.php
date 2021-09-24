<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//главная страница
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
//страница статей
Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index'])->name('article.index');
//путь к статье по названию-слагу
Route::get('/articles/{slug}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
//путь к статье по её тэгам
Route::get('/articles/tag/{tag}', [\App\Http\Controllers\ArticleController::class, 'allByTag'])->name('article.tag');
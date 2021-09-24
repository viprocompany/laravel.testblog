<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
  public function index() {
    //вывод статей на странице каталога с пагинацией 9 штук
    $articles = Article::allPaginate(9);
    return view('app.article.index', compact('articles'));
  }
  public function show($slug) {
    //вывод одной статьи по слагу с помощью скоупа findBySlug,прописагнного в модели Article
    $article = Article::findBySlug($slug);
    return view('app.article.show', compact('article'));
  }
  //вывод одной всех статей по тэгу с помощью скоупа findByTag,прописагнного в связи  модели Article , пагинация прописана в скоупе модели Article
  //используем из модели Tag связзь многие ко многи прописанную в методе articles()
  public function allByTag(Tag $tag) {
    $articles = $tag->articles()->findByTag();
    return view('app.article.byTag', compact('articles'));
  }
}

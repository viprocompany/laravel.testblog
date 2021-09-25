<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{

  public function show()
  {
//тянем из модели первую статью с привязанными к ней комментами , тегами и статистикой
    $article = Article::with('comments', 'tags', 'state')->first();
   //выводим новый объект ресурса с параметрами статьи
    return new ArticleResource($article);
  }
}

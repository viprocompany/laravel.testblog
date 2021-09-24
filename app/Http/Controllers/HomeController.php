<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
  public function index() {

//    для привязанных из других таблиц параметров используем жадную загрузку with('state', 'tags')
//    $articles = Article::with('state', 'tags')->orderBy('created_at', 'desc')->take(6)->get();
    //вышеуказанный код запроса with('tags', 'state')->orderBy('created_at', 'desc')->limit($numbers)->get() для
    // обращения к модели Article перенесен в скоуп scopeLastLimit в модель Article для того чтобы в контроллере не
    // выводить весь запрос целиком , а только скоуп с передачей в него параметра

    //при использовании скоупа lastLimit нужно передать в него параметр количества выводимых статей
    $articles = Article::lastLimit(6);

    return  view('app.home', compact('articles'));
  }
}
// limit();

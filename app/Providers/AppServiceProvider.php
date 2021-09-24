<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //пишем для пагинации
      Paginator::useBootstrap();

      $this->activeLinks();
    }

    //данную функцию нужно зарегистрировать с в методе boot.
  //показывает активность ссылки страниц mainLink главной и каталога articleLink для главного шаблона layouts.app
  public function  activeLinks() {
    \Illuminate\Support\Facades\View::composer('layouts.app', function($view) {
      $view->with('mainLink', request()->is('/') ? 'menu-link__active' : '');
      $view->with('articleLink', (request()->is('articles') or  request()->is('articles/*')) ? 'menu-link__active' : '');
    });
  }
}

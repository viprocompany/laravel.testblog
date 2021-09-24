<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel-Vue Blog</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Styles -->
<link href="{{ mix('/css/app.css') }}" rel="stylesheet">

</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link menu-link {{ $mainLink }} "
                 href=" {{ route('home')  }}">Главная страница</a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu-link {{ $articleLink }}"
                 href="{{ route('article.index')  }}">Каталог статей</a>
            </li>
          </ul>
          <a class="d-flex justify-content-end" href="https://github.com/viprocompany">

            <i class="bi bi-github" style="color:black; font-size: 2rem;"></i>
          </a>
        </div>
      </div>
    </nav>

{{--    переносим код в partials/hero--}}

{{--    <div class="hero" style="background-image: url(/img/lorenzo-herrera.jpg);">--}}
{{--      <div class="container h-100">--}}
{{--        <div class="row h-100 align-items-center">--}}
{{--          <div class="col-12">--}}
{{--            <div class="hero__content text-center">--}}
{{--              <div class="hero__content-tag">--}}
{{--                <a href="#">Разработчик PHP - Laravel</a>--}}
{{--              </div>--}}
{{--              <h2><a href="#">Тестовое задание</a></h2>--}}

{{--              <div class="hero__content-tag">--}}
{{--                <a href="#">Udemy.com</a>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

    @yield('hero')
    @yield('content')
    @yield('vue')
  </div>

</body>

</html>
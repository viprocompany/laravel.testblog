@extends('layouts.app')
@section('content')
<div id="app">
  <div class="row mt-5">
    <div class="col-12 p-3">
        <article-component></article-component>
      <img src="{{$article->img}}" class="card-img-top" alt="...">
      <h5 class="mt-5">{{$article->title}}</h5>
      <p>
        @foreach ($article->tags as $tag)
        @if($loop->last)
        <span class="tag">{{$tag->label}}</span>
        @else
        <span class="tag">{{$tag->label}}</span>
        @endif
        @endforeach
      </p>
      <p class="card-text">{{$article->body}}</p>
      <p>Опубликовано: {{$article->publishedAtForHumans()}}</p>
        <div class="mt-3">
            <span class="badge bg-success">{{$article->state->likes}}<i class="far fa-thumbs-up"></i></span>
            <span class="badge bg-primary">{{$article->state->views}}<i class="far fa-eye"></i></span>
        </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <form action="" class="mb-3">
      <div class="mb-3">
        <label for="commentSubject" class="form-label"> Тема коммментария</label>
        <input type="text" class="form-control" id="commentSubject">
      </div>
      <div class="mb-3">
        <label for="commentBody" class="form-label">Коммментарий</label>
        <textarea type="text" class="form-control" id="commentBody" rows="3"></textarea>
      </div>
      <button class="btn btn-success">Отправить</button>
    </form>
  </div>
  <div class="toast-container pb-5 mt-5 mx-auto">
        @foreach ($article->comments as $comment)


    <!-- <div class="toast showing" style="width: 100%;"> -->
            <div class="showing" style="width: 100%;">


                <div class="toast-header">
                    <img src="https://via.placeholder.com/100/009BFF/FFFFFF/?text=User" alt="LARAVEL">
                    <strong class="mx-auto">{{$comment->subject}}</strong>
                    <small class="mx-auto">{{$comment->createdAtForHumans()}}</small>
                </div>
                <div class="toast-body mb-5" >
<p>Комментарий:</p>
                    {{$comment->body}}
                </div>
            </div>

        @endforeach
  </div>


</div>

@endsection
@section('vue')
<script src="{{ mix('/js/app.js') }}"></script>
@endsection
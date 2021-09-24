<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property string $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\State|null $state
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Database\Factories\ArticleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @mixin \Eloquent

 */
class Article extends Model
{
//  использование фабрики для данной модели
    use HasFactory;
//    разрешенные поля
    protected $fillable = ['title' , 'body', 'img' ,'slug'];

//для того чтобы с данным таймстампом могла работать библиотека Carbon добавляем его в массив дат
      public $dates = ['published_at'];


//    связь один пост ко многимкомментариям с таблицей комментариев для возможности вытащить комменты к посту
  public function comments(){
    return $this->hasMany(Comment::class);
  }
//  связь со статистикой поста 1 к 1
  public function state(){

    return $this->hasOne(State::class);
  }
//  связь поста с тегами многие ко многим , один пост много тегов и один tag = много постов
  public function tags(){

    return $this->belongsToMany(Tag::class);
  }

//метод для обрезки количества знаков в записи с помощью хелпера limit
  public function getBodyPreview(){
    return Str::limit($this->body, 100);
  }
//время создания статьи в человекочитаемом формате с использование  карбоновской функции diffForHumans
  public function createdAtForHumans(){
    return $this->created_at->diffForHumans();
//        return $this->published_at->diffForHumans();
  }
  public function publishedAtForHumans(){
//    return $this->created_at->diffForHumans();
        return $this->published_at->diffForHumans();
  }


  //пишем скоуп для хранения запроса, используемого для вывода статей на странице, котрый используем в HomeController
  // в методе  index для модели Article::
  public function scopeLastLimit($query, $numbers)
  {
    return $query->with('tags', 'state')->orderBy('created_at', 'desc')->limit($numbers)->get();
  }

//пишем скоуп для хранения запроса, используемого для пагинации вывода статей на странице index, который используем в ArticleController в экшне  index для модели Article
  public function scopeAllPaginate($query, $numbers)
  {
    return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate($numbers);
  }
// скоуп для хранения запроса, используемого для  вывода статьи по её названию в виде слага, который используем в
// ArticleController в экшне  show для модели Article
//firstOrFail() выводит первую статью из базы по этому слагу или ошибку
  public function scopeFindBySlug($query, $slug)
  {
    return $query->with('comments','tags', 'state')->where('slug', $slug)->firstOrFail();
  }
// скоуп для хранения запроса, используемого для  вывода статьи по её названию в виде слага, который используем в
// ArticleController в экшне  allByTag
  public function scopeFindByTag($query)
  {
    return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate(9);
  }





}

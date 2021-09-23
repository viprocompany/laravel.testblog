<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\State;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     *
     *  @var Article
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

//      создаем переменую $tags для модели Tag , использум фабрику 10 раз для создания коллекции тегов методом create
      $tags = Tag::factory(5)->create();
      //      создаем переменую $articles для модели Article , запускаем фабрику 20 раз для создания коллекции статей
      $articles = Article::factory(20)->create();

//      сохраняем все айдишники всех тегов в массив
//      $tags_id = $tags->pluck('10');
      foreach ($tags as $key => $tag){
        $tags_id[$key] = $tag;
      }
//      $articles->each прогоняем через цикл коллекцию статей ? разбивая их на элементы $article с использованием массива айдишников тегов $tags_id

      $articles->each(function ($article) use ($tags_id){

        //с помощью фабрики генерим один элемент статистики  для модели статистики дляполя айдишника статьи , взятых из id выбранной статьи
        State::factory(1)->create([
          'article_id' => $article -> id,
        ]);

        //с помощью фабрики генерим для модели комментариев три айдишника статей , взятых из id выбранных статей
        Comment::factory(3)->create([
          'article_id' => $article -> id,
        ]);
//        присваиваем (attach) каждой статье с помощью метода tags модели Article рандомно выбранные три айдишника тегов
        //не заработал attach с массивом
//        $article->tags()->attach($tags_id->random(3));
//        $article->tags()->attach(Arr::random($tags_id, 3));
//        $article->tags()->attach($tag );

        $tag = array_rand($tags_id,  3);
        $article->tags()->attach($tags_id[$tag[0]]);
        $article->tags()->attach($tags_id[$tag[1]]);
        $article->tags()->attach($tags_id[$tag[2]]);


      });







    }
}

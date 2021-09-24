<?php

namespace Database\Factories;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//с помощью библиотеки faker генерируем название статьи из 6 слов
      $title = $this->faker->sentence(6, true);
//заполняем $slug из переменной $title переведя её в нижний регистр с помощью Str::lower,  заменяем пробелы на тире = preg_replace, удаляем последний символ в названии статьи (тоску) с помощью функции  Str::substr ,
      $slug = Str::substr(Str::lower(preg_replace('/\s+/', '-', $title)), 0 , -1);

        return [
            'title' => $title,
//          с помощью faker и его метода paragraph генерируем параграф на 100 предложений
            'body' => $this->faker->paragraph(100, true),
            'slug' => $slug,
            'img' => 'https://via.placeholder.com/600/009BFF/FFFFFF/?text=LARAVEL:8.*',
          // с помощью faker и его метода dateTimeBetween генерируем даты созданные год назад и раньше
            'created_at' => $this->faker->dateTimeBetween('-1 years'),
          //дата на текущий момент с помощью библиотеки Carbon
          'published_at' => Carbon::now(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
//          генерируем фразу из трех слов
            'subject' => $this->faker->sentences(3 , true),
//      генерируем текст из трех предложений
            'body' => $this->faker->paragraph(3, false),

        ];
    }
}

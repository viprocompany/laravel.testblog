<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = State::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//          генерируем количество лайков
           'likes' => $this->faker->numberBetween($min=1 , $max = 20),
          //          генерируем количество показов
           'views' => $this->faker->numberBetween($min=21 , $max = 100),
        ];
    }
}

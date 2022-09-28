<?php

namespace Database\Factories;

use App\Models\Homework;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeworkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Homework::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'slug' => $this->faker->slug,
            'deadline' => $this->faker->date,
            'type' => $this->faker->numberBetween(0, 127),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\DoneHomework;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoneHomeworkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DoneHomework::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }
}

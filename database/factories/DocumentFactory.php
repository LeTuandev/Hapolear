<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'type' => Str::random(5),
            'img_path' => $this->faker->url,
            'lesson_id' => $this->faker->numberBetween(1, 200),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text,
            'thumbnail' => $this->faker->imageUrl,
            'price' => $this->faker->numerify,
            'requirement' => $this->faker->text,
        ];
    }
}

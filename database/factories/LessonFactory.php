<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->numberBetween(1,200),
            'description' => $this->faker->text,
            'thumbnail' => $this->faker->imageUrl,
            'requirment' => $this->faker->text,
            'name' => $this->faker->name,
        ];
    }
}

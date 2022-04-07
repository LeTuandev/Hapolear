<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'star' => $this->faker->numberBetween(1, 200),
            'votes' => $this->faker->numberBetween(1, 200),
            'comment' => $this->faker->text,
            'user_id' => $this->faker->numberBetween(1, 200),
            'course_id' => $this->faker->numberBetween(1, 200),
        ];
    }
}

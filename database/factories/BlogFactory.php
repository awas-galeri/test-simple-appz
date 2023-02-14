<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(mt_rand(1, 2)),
            'excerpt' => fake()->paragraph(1),
            'body' => fake()->paragraph(mt_rand(5, 10)),
            'user_id' => mt_rand(1, 100)
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->sentence, // Generate a  fake senctence
            'body' => $this->faker->paragraph(24), // Generate  fake 24 paragraphs
            'user_id' => User::factory() // Generate a User from factory and extracts id
        ];
    }
}

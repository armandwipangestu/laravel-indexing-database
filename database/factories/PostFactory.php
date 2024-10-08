<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $post->categories()->attach($categories);
        });
    }
}

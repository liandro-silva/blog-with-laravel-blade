<?php

namespace Database\Factories;

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
        $keywords = [
            'technology', 'business', 'design', 'coding', 'workspace',
            'meeting', 'team', 'startup', 'innovation', 'development',
            'laptop', 'office', 'creative', 'work', 'collaboration',
        ];

        $keyword = fake()->randomElement($keywords);
        $width = fake()->randomElement([400, 600, 800]);
        $height = fake()->randomElement([300, 400, 500]);

        $imageUrl = "https://picsum.photos/{$width}/{$height}?{$keyword}";
        
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->unique()->slug(),
            'image' => $imageUrl,
            'tags' => fake()->words(3, true),
            'content' => fake()->paragraphs(3, true),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'excerpt' => '<p>'. implode( '<p></p>', $this->faker->paragraphs(2) ) . '</p>',
            'content' => '<p>'. implode( '<p></p>', $this->faker->paragraphs(6) ) . '</p>'
        ];
    }
}
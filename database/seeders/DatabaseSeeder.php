<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Comment::truncate();
        // Category::truncate();
        // User::truncate();
        // Post::truncate();

        User::factory(10)->create();
        Post::factory(10)->create();
    }
}

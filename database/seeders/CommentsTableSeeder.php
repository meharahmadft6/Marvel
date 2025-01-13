<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        // Fetch all posts and users
        $posts = Post::all();
        $users = User::all();

        // Seed comments for each post
        foreach ($posts as $post) {
            foreach ($users as $user) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                    'rating' => rand(1, 5),
                    'content' => fake()->sentence(rand(5, 15)),
                ]);
            }
        }
    }
}

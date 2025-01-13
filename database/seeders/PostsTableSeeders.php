<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeders extends Seeder
{
    public function run()
    {
        $posts = [
            [
                'title' => 'Post One',
                'excerpt' => 'Summary of Post One',
                'body' => 'This is the first post.',
                'image_url' => 'ahmoo.jgp',
                'is_published' => 0,
                'min_to_read' => 2,
            ],

            [
                'title' => 'Post Two',
                'excerpt' => 'Summary of Post Two',
                'body' => 'This is the second post.',
                'image_url' => 'example.jpg',
                'is_published' => 1,
                'min_to_read' => 1,
            ],
            [
                'title' => 'Post Three',
                'excerpt' => 'Summary of Post Three',
                'body' => 'This is the third post.',
                'image_url' => 'example2.jpg',
                'is_published' => 0,
                'min_to_read' => 3,
            ],



        ];

        foreach ($posts as $keys => $value) {
            Post::create($value);
        }
    }
}

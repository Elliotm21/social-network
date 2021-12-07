<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        $p = new Post;
        $p->title = "Dave's first post.";
        $p->body = "This is my first post.";
        $p->user_id = 1;
        $p->save();

        $posts = Post::factory()->count(10)->create();
    }
}


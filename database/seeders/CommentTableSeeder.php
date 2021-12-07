<?php

namespace Database\Seeders;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    public function run()
    {
        $c = new Comment;
        $c->text = "I am commenting on my own post.";
        $c->user_id = 1;
        $c->post_id = 1;
        $c->save();

        $comments = Comment::factory()->count(10)->create();
    }
}


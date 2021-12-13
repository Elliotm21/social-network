<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Post $post)
    {
        // Get the current likes on the post by the user
        $likes = Like::select('id')
            ->where('user_id', Auth::id())
            ->where('post_id', $post->id)
            ->get();

        if (count($likes) == 0) // If the user has not liked the post
        {
            // Allow the like
            $l = new Like;
            $l->user_id = Auth::id();
            $l->post_id = $post->id;
            $l->save();
    
            session()->flash('message', 'Post liked.');
            return redirect()->route('posts.show', $post);
        }
        else // If the user has already liked the post
        {
            // Don't allow the like
            session()->flash('message', 'You have already liked this post.');
            return redirect()->route('posts.show', $post);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
        $validatedData = $request->validate([
            'text' => 'required|max:255',
        ]);
        
        $c = new Comment;
        $c->text = $validatedData['text'];
        $c->user_id = Auth::id();
        $c->post_id = $post->id;
        $c->save();

        // session()->flash('message', 'Comment Created.');
        return redirect()->route('posts.show', $post);
    }

    public function show($id)
    {
        //
    }

    public function edit(Comment $comment)
    {
        if (Auth::id() == $comment->user_id || auth()->user()->admin)
        {
            return view('comments.edit', ['comment' => $comment]); 
        }
        else
        {
            // session()->flash('message', 'You cannot edit a comment that does not belong to you!');
            return redirect()->route('posts.show', $comment->post_id);
        }
    }

    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:255',
        ]);
            
        $comment->text = $validatedData['text'];
        $comment->save();

        // session()->flash('message', 'Comment Edited.');
        return redirect()->route('posts.show', $comment->post_id);
    }

    public function destroy(Comment $comment)
    {
        if (Auth::id() == $comment->user_id || auth()->user()->admin)
        {
            $comment->delete();
            // session()->flash('message', 'Post was deleted!');
        }
        else
        {
            // session()->flash('message', 'You cannot delete a post that does not belong to you!');
        }

        return redirect()->route('posts.show', $comment->post_id);
    }

    public function like(Request $request, Comment $comment)
    {
        $likes = $comment->likes()
            ->where('likeable_id', $comment->id)
            ->where('user_id', Auth::id());

        if ($likes->count() == 0)
        {
            $like = new Like;
            $like->user_id = Auth::id();
            $comment->likes()->save($like);
        }
        else
        {
            session()->flash('message', 'You have already liked this comment!');
        }
    
        // session()->flash('message', 'Comment liked.');
        return redirect()->route('posts.show', $comment->post_id);
    }
}
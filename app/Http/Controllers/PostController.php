<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        // Pushes most recent posts to the top
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:255',
        ]);

        $p = new Post;
        $p->title = $validatedData['title'];
        $p->body = $validatedData['body'];
        $p->user_id = Auth::id();
        $p->save();

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $post->views = $post->views + 1;
        $post->save();

        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        if (Auth::id() == $post->user_id || auth()->user()->admin)
        {
            return view('posts.edit', ['post' => $post]); 
        }
        else
        {
            session()->flash('message', 'You cannot edit a post that does not belong to you!');
            return redirect()->route('posts.show', $post);
        }
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:255',
        ]);
            
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->save();

        // session()->flash('message', 'Post Edited.');
        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        if (Auth::id() == $post->user_id || auth()->user()->admin)
        {
            $post->delete();
            session()->flash('message', 'Post was deleted!');
            return redirect()->route('posts.index');
        }
        else
        {
            session()->flash('message', 'You cannot delete a post that does not belong to you!');
            return redirect()->route('posts.show', $post);
        }
    }

    public function like(Request $request, Post $post)
    {
        $likes = $post->likes()
            ->where('likeable_id', $post->id)
            ->where('user_id', Auth::id());

        if ($likes->count() == 0)
        {
            $like = new Like;
            $like->user_id = Auth::id();
            $post->likes()->save($like);
        }
        else
        {
            session()->flash('message', 'You have already liked this comment!');
        }
    
        return redirect()->route('posts.show', $post);
    }
}
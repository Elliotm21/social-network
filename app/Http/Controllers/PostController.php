<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
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

        return redirect()->route('posts.index')->with('message', 'Post was created!');
    }

    /*
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show', ['post' => $post]);
    }
    */

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $id = auth()->user()->id;
        
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:255',
        ]);
            
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->save();

        session()->flash('message', 'Thread Edited.');
        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        if (Auth::id() == $post->user_id)
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

    public function page()
    {
        return view('index1');
    }

    public function apiIndex()
    {
        $posts = Post::all();
        return $posts;
    }
}
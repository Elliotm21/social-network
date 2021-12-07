<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
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

        session()->flash('message', 'Comment Created.');
        return redirect()->route('posts.show', $post);
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
